<?php
App::uses('AppController', 'Controller');
App::uses('Folder','Utility');

class StudentsController extends AppController {
    //public $components = array('Auth');
    public $components = array('HighCharts.HighCharts');

    public $helpers = array('Js');

    public function beforeFilter() {
        //$this->Auth->allow('register');
        $this->Auth->allow('register');
    }

    /**
     *
     */
    public function index() {
        // set the student in the view
        $student = $this->getLoggedStudent();
        $calenderEvents = [];

        $this->loadModel('FieldCommunity');
        $this->loadModel('EventFeedback');
        $this->loadModel('Event');
        $this->loadModel('ProgramEvalCheckpoint');
        $this->loadModel('FieldVisit');
        $this->loadModel('FieldVisitAttendance');
        $this->loadModel('AssesmentCheckpoint');
        $this->loadModel('AssesmentCriteria');

        $activities = [];
        $activities['completed'] = 0;
        $activities['uncompleted'] = 0;
        $activities['evaluated'] = 0;
        $activities['count'] = 0;

        // Set the field community
        $fieldCommunityId = $student['FieldGroup']['field_community_id'];
        $fieldCommunity = $this->FieldCommunity->find('first', array(
            'conditions' => array(
                'id' => $fieldCommunityId
            ),
            'recursive' => -1,
        ));

        $totalFeedback = $this->EventFeedback->find('all', array(
            'conditions' => array(
                'EventFeedback.field_group_id' => $student['FieldGroup']['id'],
                'EventFeedback.seen' => 0,
            ),
            'recursive' => -1,
        ));
        $activities['unread_comments'] = count($totalFeedback);

        $evalCheckpoints = $this->ProgramEvalCheckpoint->find('all', array(
            'conditions' => array(
                'ProgramEvalCheckpoint.field_group_id' => $student['FieldGroup']['id'],
            ),
//            'recursive' => -1,
        ));

        foreach($evalCheckpoints as $evalCheckpoint) {
            $evlChk[0] = date('d/m/Y', strtotime($evalCheckpoint['ProgramEvalCheckpoint']['date']));
            $evlChk[1] = $evalCheckpoint['HealthIssue']['issue_name'] . ': ' .$evalCheckpoint['ProgramEvalCheckpoint']['checkpoint'];
            $evlChk[2] = Router::url(array('controller' => 'students', 'action' => 'evaluateProgram'));
            $evlChk[3] = '#e84c3d';

            array_push($calenderEvents, $evlChk);
        }

        $events = $this->Event->find('all', array(
            'conditions' => array(
                'Event.field_group_id' => $student['FieldGroup']['id'],
            ),
            'recursive' => 1,
        ));

        $activities['count'] = count($events);

        foreach($events as $event) {
            if($event['Event']['complete'] == 0) {
                $activities['uncompleted'] += 1;

                $communityEvent[0] = date('d/m/Y', strtotime($event['Event']['date']));
                $communityEvent[1] = $event['Event']['title'];
                $communityEvent[2] = Router::url(array('controller' => 'students', 'action' => 'completeActivity', $event['Event']['id']));
                $communityEvent[3] = '#3598dc';
//                $communityEvent[4] = $event['Event']['description'];

                array_push($calenderEvents, $communityEvent);

            } else {
                $activities['completed'] += 1;
            }

            if(!empty($event['Event']['score_id'])) {
                $activities['evaluated'] += 1;
            }
        }

        if($activities['count'] != 0)
            $activities['percentage'] = round(($activities['completed'] / $activities['count']) * 100, 1);
        else {
            $activities['percentage'] = 0;
        }

        $visits = $this->FieldVisit->find('all', array(
            'conditions' => array(
                'FieldVisit.field_community_id' =>  $student['FieldGroup']['field_community_id'],
                'FieldVisit.field_group_id' =>  $student['FieldGroup']['id'],
            ),
            'recursive' => 1,
        ));

        $dashFieldVisits = [];
        $dashFieldVisits['up_coming'] = 0;
        $dashFieldVisits['completed'] = 0;
        $dashFieldVisits['confirm'] = 0;
        $dashFieldVisits['percentage'] = 0;
        $dashFieldVisits['count'] = 0;
        $dashFieldVisits['unmarked'] = 0;
        $comingVisits = [];
        foreach($visits as $visit) {
            if((time() - strtotime($visit['FieldVisit']['date'])) < 0) {

                $comingVisits[0] = date('d/m/Y', strtotime($visit['FieldVisit']['date']));
                $comingVisits[1] = 'Field Visit on ' . $visit['FieldVisit']['date'];
                $comingVisits[2] = '#';
                $comingVisits[3] = '#2ecd71';
                $comingVisits[4] = $visit['FieldVisit']['main_objective'];

                $dashFieldVisits['up_coming'] += 1;

                array_push( $calenderEvents, $comingVisits);

            } else {
                $dashFieldVisits['completed'] += 1;

                if(empty($visit['FieldVisitAttendance'])) {
                    $dashFieldVisits['unmarked'] += 1;
                } else {
                    $markred = 0;
                    foreach($visit['FieldVisitAttendance'] as $attentance) {
                        if($attentance['student_id'] == $student['Student']['id']) {
                            $markred++;
                        }
                    }
                    if($markred == 0) {
                        $dashFieldVisits['unmarked'] += 1;
                    }
                }
            }
        }

        $dashFieldVisits['count'] = count($visits);

        if($dashFieldVisits['completed'] != 0) {
            $dashFieldVisits['percentage'] = round($dashFieldVisits['completed'] / count($visits) * 100, 1);
        }

        $needsConfirming = [];
        $visitAttendances = $this->FieldVisitAttendance->find('all', array(
            'conditions' => array(
                'FieldVisitAttendance.field_group_id' =>  $student['FieldGroup']['id'],
                'FieldVisitAttendance.confirmed' =>  0,
            ),
            'recursive' => 1,
        ));

        foreach($visitAttendances as $attendance) {
            if(empty($attendance['FieldVisitConfirm'])) {
                array_push($needsConfirming, $attendance);
            } else {

                if(count($attendance['FieldVisitConfirm']) < 2) {
                    foreach($attendance['FieldVisitConfirm'] as $confirms) {
                        if($confirms['confirmer'] != $student['Student']['id']) {
                            array_push($needsConfirming, $attendance);
                        }
                    }
                }
            }
        }

        // getting performance (NEEDS MAJOR REFACTORING)

        $groupProgressData = [];
        $groupProgressData['Members'] = [];
        $groupProgressData['Final Scores'] = [];

        $groupMembers = $this->Student->find('all', array(
            'conditions' => array(
                'Student.field_group_id' => $student['FieldGroup']['id'],
            ),
            'recursive' => 1,
        ));

        $visitAttendances = $this->FieldVisitAttendance->find('all', array(
            'conditions' => array(
                'FieldVisitAttendance.field_group_id' =>  $student['FieldGroup']['id'],
//                'FieldVisitAttendance.student_id' =>  $student['Student']['id'],
            ),
            'recursive' => 1,
        ));

        $visits = $this->FieldVisit->find('all', array(
            'conditions' => array(
                'FieldVisit.field_community_id' =>  $student['FieldGroup']['field_community_id'],
                'FieldVisit.field_group_id' =>  $student['FieldGroup']['id'],
            ),
            'recursive' => 1,
        ));

        $events = $this->Event->find('all', array(
            'conditions' => array(
                'Event.field_community_id' =>  $student['FieldGroup']['field_community_id'],
                'Event.field_group_id' =>  $student['FieldGroup']['id'],
                'Event.complete' =>  1,
            ),
            'recursive' => 1,
        ));

        $currentMembersPerf = [];
        foreach($groupMembers as $member) {

            $grpMemberData = [];
            $grpMemberData['Scores'] = [];
            $grpMemberData['Student ID'] = $member['Student']['id'];
            $grpMemberData['Student Name'] = $member['Student']['first_name'] . ' ' . $member['Student']['last_name'];
            $grpMemberData['Student Photo'] = $member['Student']['profile_photo'];
            $completedVisitCount = 0;
            foreach($visits as $visit) {
                if((time() - strtotime($visit['FieldVisit']['date'])) > 0) {
                    $completedVisitCount++;
                }
            }

            $currentStdAttendance = 0;
            foreach($visitAttendances as $attendance) {
                if($attendance['FieldVisitAttendance']['student_id'] == $member['Student']['id']) {
                    if($attendance['FieldVisitAttendance']['confirmed'] == 1) {
                        if($attendance['FieldVisitAttendance']['attended'] == 1) {
                            $currentStdAttendance++;
                        }
                    }
                }
            }

            if($completedVisitCount != 0) {
                $grpMemberData['Scores']['Field Visit Attendance'] = round(($currentStdAttendance / $completedVisitCount) * 100, 1);
                if($member['Student']['id'] === $student['Student']['id']) {
                    $currentMembersPerf['Field Visit Attendance'] = round(($currentStdAttendance / $completedVisitCount) * 100, 1);
                }
            } else {
                $grpMemberData['Scores']['Field Visit Attendance'] = 0;
                if($member['Student']['id'] === $student['Student']['id']) {
                    $currentMembersPerf['Field Visit Attendance'] =  0;
                }
            }

            /* END OF ATTENDANCE % */

            $grpMemberData['Scores']['Peer Review Score'] = 0;

            $checkpoints = $this->AssesmentCheckpoint->find('all', array('recursive' => -1));
            $criterias = $this->AssesmentCriteria->find('all', array('recursive' => -1));

            $this->loadModel('PeerAssesment');
            $assesments = $this->PeerAssesment->find('all', array(
                'conditions' => array(
                    'PeerAssesment.student_id' => $member['Student']['id'],
                    'PeerAssesment.field_group_id' => $member['FieldGroup']['id'],
                ),
                'recursive' => -1
            ));

            $result = $this->getAveragePeerAssesment($checkpoints, $criterias, $assesments, $member['Student']['id']);
            $assesmentByCriteria = $this->getAveragePeerAssesmentByCriteria($result, $criterias);

            $totlaCriterias = count($assesmentByCriteria);

            $totalAverage = 0; // store the sum of avaerage

            foreach($assesmentByCriteria as $byCriteria) {
                $totalPerCriteria = 0;
                foreach($byCriteria as $values) {
                    $totalPerCriteria += $values['Score'];
                }

                if(!count($byCriteria) == 0) {
                    $totalAverage += $totalPerCriteria / count($byCriteria);
                } else {
                    $totalAverage += 0;
                }

            }

            $grpMemberData['Scores']['Peer Review Score'] = round($totalAverage / $totlaCriterias, 1);
            if($member['Student']['id'] === $student['Student']['id']) {
                $currentMembersPerf['Peer Review Score'] = round($totalAverage / $totlaCriterias, 1);
            }

            array_push($groupProgressData['Members'], $grpMemberData);
        }


        // Calculate Completed Events
        $totalCompletedEventCount = count($events);
        $totalEventScore = 0;
        foreach($events as $event) {
            $totalEventScore += $event['Score']['mark'];
        }
        if($totalCompletedEventCount != 0) {
            $groupProgressData['Final Scores']['Group Community Activity Score'] = round($totalEventScore / $totalCompletedEventCount, 1);
        } else {
            $groupProgressData['Final Scores']['Group Community Activity Score'] = 0;
        }

        $grpMemberCount = count($groupProgressData['Members']);
        $grTotalAttendance = 0;
        $grpTotalPeerReview = 0;
        foreach($groupProgressData['Members'] as $grpMember) {
            $grTotalAttendance += $grpMember['Scores']['Field Visit Attendance'];
            $grpTotalPeerReview += $grpMember['Scores']['Peer Review Score'];
        }

        if($grpMemberCount != 0) {
            $groupProgressData['Final Scores']['Group Attendance Score'] = round( $grTotalAttendance / $grpMemberCount, 1);
            $groupProgressData['Final Scores']['Group Peer Assessment Score'] = round( $grpTotalPeerReview / $grpMemberCount, 1);
        } else {
            $groupProgressData['Final Scores']['Group Attendance Score'] = 0;
            $groupProgressData['Final Scores']['Group Peer Assessment Score'] = 0;
        }



        $finalTotal = 0;
        foreach($groupProgressData['Final Scores'] as $key => $value) {
            $finalTotal += $value;
        }

        $groupProgressData['Score'] = round($finalTotal / count($groupProgressData['Final Scores']), 1);

        //$this->set(compact('student', 'groupProgressData'));

        $this->set(compact('student', 'fieldCommunity', 'activities', 'calenderEvents', 'dashFieldVisits', 'needsConfirming', 'groupProgressData', 'currentMembersPerf'));

    }

    public function view() {
        $this->set('student',  $this->getLoggedStudent());
    }

    public function register() {
        if ($this->request->is('post')) {
            
            if ($this->uploadPhoto($this->request->data['Student']['profile_photo'])) {
                $user['User']['role'] = 'Student';
                $user['User']['username'] = $this->request->data['Student']['username'];
                $user['User']['password'] = $this->request->data['Student']['password'];
                
                $this->Student->User->create();
                $user = $this->Student->User->save($user);

                $this->request->data['Student']['user_id'] = $user['User']['id'];

                $this->Student->create();
                $student = $this->Student->save($this->request->data);
                
                if ($user != null && $student != null) {
                    $this->Session->setFlash(__('<b>Congratulations!</b>  You are now registered. Please wait for account approval.'), 'flashSuccess');
                    return $this->redirect(array('controller' => 'pages', 'action' => 'home'));
                } else {
                    $this->Session->setFlash(__('Oopz! Registration failed. Please try again.'), 'flashError');
                    return $this->redirect(array('controller' => 'pages', 'action' => 'home'));
                }
            } else {
                $this->Session->setFlash(__('Oopz! Registration failed. Unable to Upload the Photo.'), 'flashError');
                //return $this->redirect(array('controller' => 'pages', 'action' => 'home'));
            }
        }
    }

    public function editStudent($id = null) {
//        if (!$this->Student->exists($id)) {
//            throw new NotFoundException(__('Invalid student'));
//        }
//
//
//        $options = array('conditions' => array('Student.' . $this->Student->primaryKey => $id));
//        $std = $this->Student->find('first', $options);
        
        // get the logged in user for redirection
        $loggedStudent = AuthComponent::user();
        
        if ($this->request->is(array('post', 'put'))) {
            $this->Student->id = $id;
            
            // is the profile picture is not updated
            if ($this->request->data['Student']['profile_photo']['error'] === UPLOAD_ERR_NO_FILE) {
                $this->request->data['Student']['profile_photo'] = $std['Student']['profile_photo'];
                if ($this->Student->save($this->request->data)) {
                    $this->Session->setFlash('Your Profile was <b>Successfully</b> Updated.', 'flashSuccess');
                    return $this->redirect(array('action' => 'view', $loggedStudent['id']));
                } else {
                    $this->Session->setFlash('Oopz, Something went Wrong. Your Profile was <b>NOT</b> Updated. Please, try again.', 'flashError');
                    return $this->redirect(array('action' => 'view', $loggedStudent['id']));
                }
            } else {
                if($this->uploadPhoto($this->request->data['Student']['profile_photo'])) {
                    if ($this->Student->save($this->request->data)) {
                        $this->Session->setFlash('Your Profile was <b>Successfully</b> Updated.', 'flashSuccess');
                        return $this->redirect(array('action' => 'view', $loggedStudent['id']));
                    } else {
                        $this->Session->setFlash('Oopz, Something went Wrong. Your Profile was <b>NOT</b> Updated. Please, try again.', 'flashError');
                        return $this->redirect(array('action' => 'view', $loggedStudent['id']));
                    }
                } else {
                    $this->Student->save($this->request->data);
                    $this->Session->setFlash('Oopz, Something went Wrong. Profile Picture Upload Failed. Your Profile was <b>NOT</b> Updated. Please, try again.', 'flashError');
                    return $this->redirect(array('action' => 'view', $loggedStudent['id']));
                }            
            }
            
        } else {
            $options = array('conditions' => array('Student.' . $this->Student->primaryKey => $id));
            $this->request->data = $this->Student->find('first', $options);
            $this->set('student', $this->request->data);
        }
        $fieldGroups = $this->Student->FieldGroup->find('list');
        $this->set(compact('fieldGroups'));
    }
    
    public function editAdmin($id = null) {
        if (!$this->Student->exists($id)) {
            throw new NotFoundException(__('Invalid student'));
        }
    
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Student->save($this->request->data)) {
                $this->Session->setFlash(__('The student has been saved.'), 'flashSuccess');
                return $this->redirect(array('action' => 'view'));
            } else {
                $this->Session->setFlash(__('The student could not be saved. Please, try again.'), 'flashError');
            }
        } else {
            $options = array('conditions' => array('Student.' . $this->Student->primaryKey => $id));
            $this->request->data = $this->Student->find('first', $options);
        }
        $fieldGroups = $this->Student->FieldGroup->find('list');
        $this->set(compact('fieldGroups'));
    }

    public function delete($id = null) {
        $this->Student->id = $id;
        if (!$this->Student->exists()) {
            throw new NotFoundException(__('Invalid student'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Student->delete()) {
            $this->Session->setFlash(__('The student has been deleted.'), 'flashInfo');
        } else {
            $this->Session->setFlash(__('The student could not be deleted. Please, try again.'), 'flashError');
        }
        return $this->redirect(array('action' => 'index'));
    }
    
    // View all Pending Student Approvals Method
    
    public function approveStudent() {
        $this->Student->recursive = 0;
        $this->set('students', $this->Student->find('all', array(
            'conditions' => array('Student.approved' => 0)
        )));
    }
    
    
    // Approve Student
    
    public function regApprove($id = null) {
        $message = null;
        $element = null;
        
        if (!$id) {            
            $message = 'The Student ID was not set properly.';
            $element = 'flashError';
        }
        
        if (!$this->Student->exists($id)) {
            $message = 'A student with ID ' . $id . ' does not exist in the database.';
            $element = 'flashError';
        } else {
            // perform the action to update the approve field in the database.
            
            $student = $this->Student->find('first', array(
               'conditions' => array('Student.id' => $id) 
            ));
            
            $this->request->data['Student']['approved'] = 1;
            $this->Student->id = $id;
            
            if ($this->Student->save($this->request->data)) {
                $message = 'Student:  ' . $student['Student']['first_name'] . " " . $student['Student']['last_name'] . ' was successfully approved.';
                $element = 'flashSuccess';
            }
            
            $this->Student->recursive = 0;
            $this->set('students', $this->Student->find('all', array(
                'conditions' => array('Student.approved' => 0)
            )));
            
        }
        
        // Redirect to approveStudent View
        $this->Session->setFlash(__($message), $element);
        $this->redirect(array('action' => 'approveStudent'));
        
    }
    
    // Decline Student
    
    public function regDecline($id = null) {
        $message = null;
        $element = null;
        
        if (!$id) {            
            $message = 'The Student ID was not set properly.';
            $element = 'flashError';
        }
        
        if (!$this->Student->exists($id)) {
            $message = 'A student with ID ' . $id . ' does not exist in the database.';
            $element = 'flashError';
        } else {
            // perform the action to delete the record from the database.
            
            
            
            // then redirect with the message
            $message = 'Student with ID ' . $id . ' was declined and removed.';
            $element = 'flashError';
        }
        
        // Redirect to approveStudent View
        $this->Session->setFlash(__($message), $element);
        $this->redirect(array('action' => 'approveStudent'));
    }
    
    
    // Change Password
    
    public function changePassword($id = null) {
        
    }

    // View Student Group Members
    
    public function viewGroupMembers($grp_id = null) {
        // set the student in the view
        if ($grp_id != null) {
            $this->set('student',  $this->getLoggedStudent());

            $options = array('conditions' => array('Student.' . 'field_group_id' => $grp_id));
            $this->set('grpStudents', $this->Student->find('all', $options));

            $this->loadModel('AssesmentCheckpoint');
            $checkpoints = $this->AssesmentCheckpoint->find('all');


            $this->set(compact('checkpoints'));

        } else {
            $this->Session->setFlash(__('Something went wrong, Can not find field group members'), 'flashError');
            return;
        }
    }
    
    // View Student Group Members Profile
    
    public function viewMemberProfile($id = null) {
        // set the student in the view
        $this->set('student',  $this->getLoggedStudent());
        
        $message = null;
        $element = null;
        
        if (!$id) {            
            $this->Session->setFlash(__('The Student ID was not set properly.'), 'flashError');
            $this->redirect(array('action' => 'viewGroupMembers', 1));
        }
        
        if (!$this->Student->exists($id)) {
            $this->Session->setFlash(__('A student with ID ' . $id . ' does not exist in the database.'), 'flashError');
            $this->redirect(array('action' => 'viewGroupMembers', 1));
        }
        
        $options = array('conditions' => array('Student.' . $this->Student->primaryKey => $id));
        $this->set('groupStudent', $this->Student->find('first', $options));
    }
    
    // View Field Group Progress
    
    public function viewPeerReviewProgress($grpId = null, $stdId = null) {
        // set the student in the view
        $this->set('student',  $this->getLoggedStudent());

        if($grpId != null && $stdId != null) {
            $this->loadModel('AssesmentCheckpoint');
            $checkpoints = $this->AssesmentCheckpoint->find('all', array('recursive' => -1));

            $this->loadModel('AssesmentCriteria');
            $criterias = $this->AssesmentCriteria->find('all', array('recursive' => -1));

            $this->loadModel('PeerAssesment');
            $assesments = $this->PeerAssesment->find('all', array(
                'conditions' => array(
                    'PeerAssesment.student_id' => $stdId,
                    'PeerAssesment.field_group_id' => $grpId,
                ),
                'recursive' => -1
            ));

            $result = $this->getAveragePeerAssesment($checkpoints, $criterias, $assesments, $stdId);

            $assesmentByCriteria = $this->getAveragePeerAssesmentByCriteria($result, $criterias);

            $this->set(compact('assesments', 'result', 'assesmentByCriteria', 'criterias'));

        } else {

        }
    }

    private function getAveragePeerAssesment($checkpoints, $criterias, $assesments, $stdId) {
        $result = [];
        $criteriasForCheckpoint = [];
        foreach($checkpoints as $checkpoint) {
            foreach($criterias as $criteria) {

                $total = 0;
                $members = 0;
                foreach ($assesments as $assesment) {
                    if($assesment['PeerAssesment']['assesment_checkpoint_id'] == $checkpoint['AssesmentCheckpoint']['id'] &&
                        $assesment['PeerAssesment']['assesment_criteria_id'] == $criteria['AssesmentCriteria']['id'] &&
                        $assesment['PeerAssesment']['student_id'] == $stdId) {

                        $members++;
                        $total += intval($assesment['PeerAssesment']['score']);

                    }
                }

                if($total != 0 && $members != 0) {
                    $avgRating = $total / $members;
                    $temp['Checkpoint'] = $checkpoint['AssesmentCheckpoint']['checkpoint'];
                    $temp['Criteria'] = $criteria['AssesmentCriteria']['criteria'];
                    $temp['Score'] = $avgRating;

                    array_push($criteriasForCheckpoint, $temp);
                } else {
                    break;
                }
            }
            array_push($result, $criteriasForCheckpoint);
            $criteriasForCheckpoint = [];
        }

        return $result;
    }

    private function getAveragePeerAssesmentByCriteria($result, $criteriaList) {
        $finalList = [];
        $ary = [];
        foreach($criteriaList as $criteria) {
            foreach($result as $res) {
                foreach($res as $r) {
                    if($criteria['AssesmentCriteria']['criteria'] === $r['Criteria']) {
                        $temp['Checkpoint'] = $r['Checkpoint'];
                        $temp['Score'] = $r['Score'];
                        array_push($ary, $temp);
                    }
                }
            }
            $finalList[$criteria['AssesmentCriteria']['id']] = $ary;
            $ary = [];
        }

        return $finalList;
    }

    public function viewCommunityProgress() {
        // set the student in the view
        $student = $this->getLoggedStudent();

        // Set the field community
        $fieldCommunityId = $student['FieldGroup']['field_community_id'];

        $this->loadModel('Household');
        $households =  $this->Household->find('all', array(
            'conditions' => array(
                'field_community_id' => $fieldCommunityId,
            ),
            'recursive' => -1
        ));

        $this->loadModel('FieldMapPoint');
        $mapPoints = $this->FieldMapPoint->find('all', array(
            'conditions' => array(
                'FieldMapPoint.field_community_id' => $student['FieldGroup']['field_community_id'],
            ),
            'recursive' => -1,
        ));


        $this->set(compact('student', 'households', 'mapPoints'));
    }

    public function viewHousehold($id = null) {
        // set the student in the view
        if($id != null) {
            $student = $this->getLoggedStudent();
            $this->set('student', $student );

            $this->loadModel('Household');
            $house = $this->Household->find('first', array(
                'conditions' => array(
                    'Household.id' => $id,
                ),
                'recursive' => 1
            ));
            $this->set('house', $house);

            $sugarUsage = $this->getSugarSaltConsumption($id);
            $this->set('sugarUsage', $sugarUsage);

            $oilUsage = $this->getOilConsumption($id);
            $this->set('oilUsage', $oilUsage);

        } else {
            $this->Session->setFlash(__('Household is not found!.'), 'flashError');
            $this->redirect(array('action' => 'viewProgress'));
        }
    }

    public function viewFamilyMember($id = null) {
        if($id != null) {
            $student = $this->getLoggedStudent();
            $this->set('student', $student );

            $this->loadModel('FamilyMember');
            $familyMember = $this->FamilyMember->find('first', array(
                'conditions' => array(
                    'FamilyMember.id' => $id,
                ),
                'recursive' => 0
            ));

            if(empty($familyMember)) {
                $this->Session->setFlash(__('Family Member not found!.'), 'flashError');
                $this->redirect(array('action' => 'viewProgress'));
                return;
            }

            $this->loadModel('BMI');
            $familyMemberBmi = $this->BMI->find('all', array(
                'conditions' => array(
                    'family_member_id' => $id
                ),
                'recursive' => -1
            ));

            $this->loadModel('WHR');
            $familyMemberWhr = $this->WHR->find('all', array(
                'conditions' => array(
                    'family_member_id' => $id
                ),
                'recursive' => -1
            ));

            $temp = array_values($familyMemberBmi);
            $lastBmiCat = end($temp);
            $lastBmiCat = $this->getBmiCategory($lastBmiCat['BMI']['value']);

            $firstBmiCat = array_values($familyMemberBmi)[0];
            $firstBmiCat = $this->getBmiCategory($firstBmiCat['BMI']['value']);


            $this->set(compact('familyMember', 'familyMemberBmi', 'familyMemberWhr', 'lastBmiCat', 'firstBmiCat'));


        } else {
            $this->Session->setFlash(__('Family Member not found!.'), 'flashError');
            $this->redirect(array('action' => 'viewProgress'));
        }
    }

    private function getBmiCategory($value) {
        if ($value > 40.0)
            return 'Morbid Obesity (Class 3)';
        else if ($value < 39.9 && $value > 35.0)
            return 'Very Obese (Class 2)';
        else if ($value > 30 && $value < 34.9)
            return 'Obese (Class 1)';
        else if ($value > 25 && $value < 29.9)
            return 'Overweight';
        else if ($value > 18.5 && $value < 24.9)
            return 'Normal';
        else if ($value > 16 && $value < 18.4)
            return 'Underweight';
        else
            return 'Severely Underweight';
    }

    public function viewFieldGroup(){
        // set the student in the view
        $student =  $this->getLoggedStudent();
        $this->set('student', $student);




    }

    public function viewFieldCommunity($id = null) {
        if($id) {
            // set the student in the view
            $student =  $this->getLoggedStudent();
            $this->set('student', $student);


            $this->loadModel('FieldCommunity');
            $community = $this->FieldCommunity->find('first', array(
                'conditions' => array(
                    'id' => $id,
                ),
                'recursive' => -1,
            ));

            if(empty($community)) {
                $this->Session->setFlash(__('A Field Community with ID ' . $id . ' does not exist in the database.'), 'flashError');
                $this->redirect(array('action' => 'index'));
            } else {
                // Load initial Data for Population
                $populationResult = $this->getPopulationInfo($id);
                $this->set('chartPopulation', $populationResult);

                // Load Age Distribution Data
                $ageDistribution = $this->getAgeDistribution($id);
                $this->set('ageDistribution', $ageDistribution);

                // Load Education Level Distribution Data
                $educationDist = $this->getEducationDistribution($id);
                $this->set('eduDistribution', $educationDist);

                // Load Occupation Distribution Data
                $occDist = $this->getOccupationDistribution($id);
                $this->set('occDistribution', $occDist);

                // Load Income Distribution Data
                $incomeDist = $this->getIncomeDistribution($id);
                $this->set('incomeDistribution', $incomeDist);

                $this->loadModel('FieldMapPoint');
                $mapPoints = $this->FieldMapPoint->find('all', array(
                    'conditions' => array(
                        'FieldMapPoint.field_community_id' => $id,
                    ),
                    'recursive' => -1,
                ));
                $this->set('mapPoints', $mapPoints);



                $this->set('community', $community);
            }
        } else {
            $this->Session->setFlash(__('Field Community ID was not passed.'), 'flashError');
            $this->redirect(array('action' => 'index'));
        }
    }

    private function getPopulationInfo($id) {
        $this->loadModel('InitPopulation');
        $population = $this->InitPopulation->find('first', array(
            'conditions' =>  array(
                'field_community_id' => $id,
            ),
            'recursive' => -1,
        ));

        $totalPop = intval($population['InitPopulation']['total_population']);
        $male = intval($population['InitPopulation']['male']);
        $female = intval($population['InitPopulation']['female']);

        $malePresentage = round(($male / $totalPop) * 100);
        $femalePresentage = (100 - $malePresentage);

        // get formal/informal settings
        $this->loadModel('FieldCommunity');
        $fieldComm = $this->FieldCommunity->find('first', array(
            'conditions' => array(
                'id' => $id,
            ),
            'recursive' => -1,
        ));

        $result = array(
            'title' => $fieldComm['FieldCommunity']['title'],
            'village_name' => $fieldComm['FieldCommunity']['village_name'],
            'male' => $male,
            'female' => $female,
            'total_population' => $totalPop,
            'male_pre' => $malePresentage,
            'female_pre' => $femalePresentage,
            'families' => $population['InitPopulation']['no_of_families'],
            'formal_settings' => $fieldComm['FieldCommunity']['no_of_formal_settings'],
            'informal_settings' => $fieldComm['FieldCommunity']['no_of_informal_settings']
        );

        return $result;
    }

    private function getAgeDistribution($id) {
        $this->loadModel('InitAgeDistribution');
        $dist = $this->InitAgeDistribution->find('all', array(
            'conditions' => array(
                'field_community_id' => $id,
            ),
            'recursive' => -1
        ));

        $result = array();
        $temp = array();

        foreach ($dist as $row){
            foreach($row as $a) {
                   array_push($result, $a);
            }
        }

        foreach($result as $key => $val) {
            $temp[$key]['Age Group'] = $val['age_group'];
            $temp[$key]['Male'] = intval($val['male']);
            $temp[$key]['Female'] = intval($val['female']);
            $temp[$key]['Total'] = $val['male'] + $val['female'];

        }
        return $temp;
    }

    private function getEducationDistribution($id) {
        $this->loadModel('InitEducationLevel');
        $dist = $this->InitEducationLevel->find('all', array(
            'conditions' => array(
                'field_community_id' => $id,
            ),
            'recursive' => -1
        ));

        $result = array();
        $temp = array();

        foreach ($dist as $row){
            foreach($row as $a) {
                array_push($result, $a);
            }
        }

        foreach($result as $key => $val) {
            $temp[$key]['Education Level'] = $val['education_level'];
            $temp[$key]['Male'] = intval($val['male']);
            $temp[$key]['Female'] = intval($val['female']);
            $temp[$key]['Total'] = $val['male'] + $val['female'];

        }
        return $temp;
    }

    private function getOccupationDistribution($id) {
        $this->loadModel('InitOccupation');
        $dist = $this->InitOccupation->find('all', array(
            'conditions' => array(
                'field_community_id' => $id,
            ),
            'recursive' => -1
        ));

        $result = array();
        $temp = array();

        foreach ($dist as $row){
            foreach($row as $a) {
                array_push($result, $a);
            }
        }

        foreach($result as $key => $val) {
            $temp[$key]['Occupation Type'] = $val['occupation_type'];
            $temp[$key]['Male'] = intval($val['male']);
            $temp[$key]['Female'] = intval($val['female']);
            $temp[$key]['Total'] = $val['male'] + $val['female'];

        }
        return $temp;
    }

    private function getIncomeDistribution($id) {
        $this->loadModel('InitIncome');
        $dist = $this->InitIncome->find('all', array(
            'conditions' => array(
                'field_community_id' => $id,
            ),
            'recursive' => -1
        ));

        $result = array();
        $temp = array();

        foreach ($dist as $row){
            foreach($row as $a) {
                array_push($result, $a);
            }
        }

        foreach($result as $key => $val) {
            $temp[$key]['Income Range'] = $val['income_range'];
            $temp[$key]['No of Families'] = intval($val['no_of_familiy']);

        }
        return $temp;
    }

    private function getOilConsumption($id) {
        $this->loadModel('OilUsage');
        $dist = $this->OilUsage->find('all', array(
            'conditions' => array(
                'household_id' => $id,
            ),
            'recursive' => -1
        ));

        $result = array();
        $temp = array();

        foreach ($dist as $row){
            foreach($row as $a) {
                array_push($result, $a);
            }
        }

        foreach($result as $key => $val) {
            $temp[$key]['Oil Usage'] = $val['value'];
            $temp[$key]['Date'] = $val['date'];

        }
        return $temp;
    }

    private function getSugarSaltConsumption($id) {
        $this->loadModel('SugarUsage');
        $sugar = $this->SugarUsage->find('all', array(
            'conditions' => array(
                'household_id' => $id,
            ),
            'recursive' => -1
        ));

        $this->loadModel('SaltUsage');
        $salt = $this->SaltUsage->find('all', array(
            'conditions' => array(
                'household_id' => $id,
            ),
            'recursive' => -1
        ));

        $resultSugar = array();
        $resultSalt = array();
        $temp = array();

        // Sugar
        foreach ($sugar as $row){
            foreach($row as $a) {
                array_push($resultSugar, $a);
            }
        }

        foreach($resultSugar as $key => $val) {
            $temp[$key]['Date'] = $val['date'];
            $temp[$key]['Sugar'] = intval($val['value']);
        }

        // Salt
        foreach ($salt as $row1){
            foreach($row1 as $b) {
                array_push($resultSalt, $b);
            }
        }

        foreach($resultSalt as $key => $val) {
            $temp[$key]['Salt'] = intval($val['value']);
        }

        return $temp;
    }


    // Generate Reports
    
    public function generateReports() {
        // set the student in the view
        $this->set('student',  $this->getLoggedStudent());
    }
    
    public function trackStudents() {
        
    }
    
    public function login() {
        if ($this->request->is('post')) {
             $this->Session->setFlash(__('<b>Congratulations!</b>  You are logged in. :)'), 'flashSuccess');
             return $this->redirect(array('controller' => 'pages', 'action' => 'home'));
        }
    }
    
    public function uploadPhoto($data) {
        $file = $data;

        if($file['error'] === UPLOAD_ERR_OK) {
            $folderName = APP.'webroot'.DS.'uploads'.DS.'students';
            $folder = new Folder($folderName, true, 0777);

//            if($id!=null){
//                if(file_exists($folderName.DS.$id)){
//                    chmod($folderName.DS.$id,0755);
//                    unlink($folderName.DS.$id);
//                }
//            }

            $id = String::uuid();

            $tmp_file = $file['tmp_name'];
            list($width, $height) = getimagesize($tmp_file);

            if ($width == null && $height == null) {
                return false;
            }

            move_uploaded_file($file['tmp_name'], $folderName.DS.$id);
            $this->request->data['Student']['profile_photo'] = $id;
            return true;
        }
        return false;
    }

    public function uploadEventPhotos($data) {
        $files = $data['EventPhoto']['image']; // array of uploaded files
        $fileCount = count($data['EventPhoto']['image']);

        $success = 0;
        $failed = 0;

        foreach($files as $file) {
            if($file['error'] === UPLOAD_ERR_OK) {
                $folderName = APP.'webroot'.DS.'uploads'.DS.'event_photos';
                $folder = new Folder($folderName, true, 0777);

//                if($id!=null){
//                    if(file_exists($folderName.DS.$id)){
//                        chmod($folderName.DS.$id,0755);
//                        unlink($folderName.DS.$id);
//                    }
//                }

                $id = String::uuid();

                $tmp_file = $file['tmp_name'];
                list($width, $height) = getimagesize($tmp_file);

                if ($width == null && $height == null) {
                    return false;
                }

                move_uploaded_file($file['tmp_name'], $folderName.DS.$id);

                // create the new object to add to database
                $evtPhotoData['EventPhoto']['event_id'] = $data['EventPhoto']['event_id'];
                $evtPhotoData['EventPhoto']['image'] = $id;

                // save record to database
                $this->loadModel('EventPhoto');
                $this->EventPhoto->create();
                $evt = $this->EventPhoto->save($evtPhotoData);
                if($evt)
                    $success++;

            } else {
                $failed++;
            }
        }

        if($failed < $fileCount)
            return true;
        else
            return false;
    }

    public function viewCheckpoint($grpId = null, $checkId = null) {
        if($grpId != null && $checkId != null) {
            $student =  $this->getLoggedStudent();

            $this->loadModel('AssesmentCheckpoint');
            $checkpoint = $this->AssesmentCheckpoint->find('first', array(
                'conditions' => array(
                    'AssesmentCheckpoint.id' => $checkId,
                ),
                'recursive' => -1
            ));

            $this->loadModel('AssesmentCriteria');
            $criterias = $this->AssesmentCriteria->find('all');


            $this->set(compact('student', 'criterias', 'checkpoint', 'grpId', 'checkId'));
        } else {
            $this->Session->setFlash(__('Checkpoint could not be loaded'), 'flashError');
            return $this->redirect(array('action' => 'index'));
        }
    }

    public function reviewGroupMembers($grpId = null, $checkId = null, $criteriaId = null) {
        if($grpId != null && $checkId != null && $criteriaId != null) {
            $student =  $this->getLoggedStudent();

            // redirect user if already rated.
            $this->loadModel('CompletePeerAssesment');
            $check = $this->CompletePeerAssesment->find('all', array(
                'conditions' => array(
                    'CompletePeerAssesment.student_id' => $student['Student']['id'],
                    'CompletePeerAssesment.assesment_checkpoint_id' => $checkId,
                    'CompletePeerAssesment.assesment_criteria_id' => $criteriaId,
                ),
                'recursive' => -1
            ));

            if(!empty($check)) {
                $this->Session->setFlash(__('You have already reviewed your group members for this checkpoint and criteria.'), 'flashInfo');
                return $this->redirect(array('action' => 'viewCheckpoint', $grpId, $checkId));
            }

            // save the rating..
            if($this->request->is('post')) {
                $data = $this->request->data;
                $ary = [];
                if(!empty($data['PeerAssesment']) && !empty($data['PeerAssesment']['Student'])) {
                    foreach($data['PeerAssesment']['Student'] as $std) {
                        $temp['PeerAssesment']['field_group_id'] = $data['PeerAssesment']['field_group_id'];
                        $temp['PeerAssesment']['assesment_criteria_id'] = $data['PeerAssesment']['assesment_criteria_id'];
                        $temp['PeerAssesment']['assesment_checkpoint_id'] = $data['PeerAssesment']['assesment_checkpoint_id'];
                        $temp['PeerAssesment']['student_id'] = $std['id'];
                        $temp['PeerAssesment']['score'] = $std['score'];

                        array_push($ary, $temp);
                    }

                    $this->loadModel('PeerAssesment');
                    $res = $this->PeerAssesment->saveMany($ary);

                    $assesmentRecord = [];
                    $this->loadModel('CompletePeerAssesment');
                    $assesmentRecord['CompletePeerAssesment']['student_id'] = $student['Student']['id'];
                    $assesmentRecord['CompletePeerAssesment']['field_group_id'] = $grpId;
                    $assesmentRecord['CompletePeerAssesment']['assesment_checkpoint_id'] = $checkId;
                    $assesmentRecord['CompletePeerAssesment']['assesment_criteria_id'] = $criteriaId;

                    $this->CompletePeerAssesment->create();
                    $res2 = $this->CompletePeerAssesment->save($assesmentRecord);


                    if($res && $res2) {
                        $this->Session->setFlash(__('Evaluation Successful!'), 'flashSuccess');
                        return $this->redirect(array('action' => 'viewCheckpoint', $grpId, $checkId));
                    } else {
                        $this->Session->setFlash(__('Failed to save Evaluation Data!'), 'flashError');
                        return $this->redirect(array('action' => 'viewCheckpoint',  $grpId, $checkId));
                    }

                 }

            }

            $this->loadModel('AssesmentCheckpoint');
            $checkpoint = $this->AssesmentCheckpoint->find('first', array(
                'conditions' => array(
                    'AssesmentCheckpoint.id' => $checkId,
                ),
                'recursive' => -1
            ));

            $this->loadModel('Student');
            $students = $this->Student->find('all', array(
                'conditions' => array(
                    'Student.field_group_id' => $grpId,
                ),
                'recursive' => -1
            ));

            $this->loadModel('AssesmentCriteria');
            $criteria = $this->AssesmentCriteria->find('first', array(
                'conditions' => array(
                    'AssesmentCriteria.id' => $criteriaId,
                ),
            ));


            $this->set(compact('student', 'students', 'criteria', 'checkpoint', 'grpId', 'checkId'));

        } else {
            $this->Session->setFlash(__('Assessment Criteria could not be loaded'), 'flashError');
            return $this->redirect(array('action' => 'index'));
        }
    }

    private function getLoggedStudent() {
            $user = AuthComponent::user();
            if ($user['role'] == 'Student') {
                $options = array('conditions' => array('Student.user_id' => $user['id']));
                return $loggedstudent = $this->Student->find('first', $options);
            } else {
                return $this->redirect(array( 'controller' => 'users', 'action' => 'redirectLoggedUser'));
            }
        }


    // Activity Related

    public function createActivity() {
        $student = $this->getLoggedStudent();
        $this->set('student', $student );

        if($this->request->is('post')) {

            $this->request->data['Event']['field_group_id'] = $student['Student']['field_group_id'];
            $this->request->data['Event']['field_community_id'] = $student['FieldGroup']['field_community_id'];

            $this->loadModel('Event');
            $this->Event->create();
            $evt = $this->Event->save($this->request->data);
            if($evt != null) {
                $this->Session->setFlash(__('<b>Success!</b>  A new community activity was created.'), 'flashSuccess');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Oopz! Could not create the community activity.'), 'flashError');
                return $this->redirect(array('action' => 'index'));
            }
        }
    }

    public function allActivity() {
        $student = $this->getLoggedStudent();

        $this->loadModel('Event');
        $allEvents = $this->Event->find('all', array(
            'conditions' => array(
                'Event.field_group_id' => $student['Student']['field_group_id'],
            ),
            'recursive' => 2,
        ));

        $participationProgress = [];
        foreach($allEvents as $event) {
            if($event['Event']['complete'] == 1) {

                $activity = $event['Event']['title'];

                $exp = intval($event['Event']['expected_attendance']);
                $par = intval($event['Event']['participated_attendance']);

                $presentage = round(($par / $exp) * 100, 2);

                $temp = [];
                $temp['Activity'] =  $activity;
                $temp['Presentage'] = $presentage;

                array_push($participationProgress, $temp);
            }
        }



        $this->set(compact('student', 'allEvents', 'participationProgress'));


    }

    public function completeActivity($id = null) {
        if($id != null) {
            $student = $this->getLoggedStudent();

            $this->loadModel('Event');
            $event = $this->Event->find('first', array(
                'conditions' => array(
                    'Event.id' => $id,
                    'Event.field_group_id' => $student['Student']['field_group_id'],
                ),
                'recursive' => -1,
            ));

            $this->loadModel('EventFeedback');
            $eventFeedbacks = $this->EventFeedback->find('all', array(
                'conditions' => array(
                    'EventFeedback.event_id' => $id,
                ),
            ));

            foreach($eventFeedbacks as $feedback) {
                $feedback['EventFeedback']['seen'] = 1;
                $this->EventFeedback->save($feedback);
            }

            if($this->request->is('post')) {
                $data = $this->request->data;

                if(!empty($this->request->data['EventPhoto'])){
                    if($this->uploadEventPhotos($data)) {
                        $this->Session->setFlash(__('Photos was successfully uploaded!'), 'flashSuccess');
                    } else {
                        $this->Session->setFlash(__('Photos failed to upload.'), 'flashError');
                    }
                }


                if(!empty($this->request->data['Event'])) {
                    $this->loadModel('EventPhoto');
                    $photos = $this->EventPhoto->find('all', array(
                        'conditions' => array(
                            'event_id' => $this->request->data['Event']['id'],
                        ),
                        'recursive' => -1,
                    ));

                    $photoCount = count($photos);

                    if($photoCount > 0) {
                        $this->loadModel('Event');
                        $this->request->data['Event']['complete'] = 1;
                        $evt = $this->Event->save($this->request->data);
                        if($evt != null) {
                            $this->Session->setFlash(__('Community Activity was successfully completed!'), 'flashSuccess');
                            return $this->redirect(array('action' => 'allActivity'));
                        } else {
                            $this->Session->setFlash(__('Oopz! Could not complete the community activity.'), 'flashError');
                            return $this->redirect(array('action' => 'allActivity'));
                        }
                    } else {
                        $this->Session->setFlash(__('Oopz! You have not uploaded any Activity Photos or Photos failed to upload.'), 'flashError');
                    }
                }
            }


            $this->set(compact('student', 'event', 'data', 'eventFeedbacks'));
        } else {
            $this->Session->setFlash(__('Community Activity not Found!'), 'flashError');
            $this->redirect(array('action' => 'allActivity'));
        }
    }

    public function viewActivity($id = null) {
        if($id != null) {
            $student = $this->getLoggedStudent();

            $this->loadModel('Event');
            $event = $this->Event->find('first', array(
                'conditions' => array(
                    'Event.id' => $id,
                ),
            ));

            $this->loadModel('EventFeedback');
            $eventFeedbacks = $this->EventFeedback->find('all', array(
                'conditions' => array(
                    'EventFeedback.event_id' => $id,
                ),
            ));

            foreach($eventFeedbacks as $feedback) {
                $feedback['EventFeedback']['seen'] = 1;
                $this->EventFeedback->save($feedback);
            }




            $this->set(compact('student', 'event', 'eventFeedbacks'));
        }else {
            $this->Session->setFlash(__('Community Activity not Found!'), 'flashError');
            $this->redirect(array('action' => 'allActivity'));
        }
    }

    public function progressOverview() {
        $student = $this->getLoggedStudent();
        $attendanceData = [];

        $this->loadModel('FieldVisit');
        $this->loadModel('FieldVisitAttendance');
        $this->loadModel('AssesmentCheckpoint');
        $this->loadModel('AssesmentCriteria');

        $visitAttendances = $this->FieldVisitAttendance->find('all', array(
            'conditions' => array(
                'FieldVisitAttendance.field_group_id' =>  $student['FieldGroup']['id'],
//                'FieldVisitAttendance.student_id' =>  $student['Student']['id'],
            ),
            'recursive' => 1,
        ));

        $visits = $this->FieldVisit->find('all', array(
            'conditions' => array(
                'FieldVisit.field_community_id' =>  $student['FieldGroup']['field_community_id'],
                'FieldVisit.field_group_id' =>  $student['FieldGroup']['id'],
            ),
            'recursive' => 1,
        ));

        // Calculate Completed Events
        $completedVisitCount = 0;
        foreach($visits as $visit) {
            if((time() - strtotime($visit['FieldVisit']['date'])) > 0) {
                $completedVisitCount++;
            }
        }

        $currentStdAttendance = 0;
        foreach($visitAttendances as $attendance) {
            if($attendance['FieldVisitAttendance']['student_id'] == $student['Student']['id']) {
                if($attendance['FieldVisitAttendance']['confirmed'] == 1) {
                    if($attendance['FieldVisitAttendance']['attended'] == 1) {
                        $currentStdAttendance++;
                    }
                }
            }
        }

        if($completedVisitCount != 0) {
            $attendanceData['Field Visit Attendance'] = round(($currentStdAttendance / $completedVisitCount) * 100, 1);
        } else {
            $attendanceData['Field Visit Attendance'] = 0;
        }

        /* END OF ATTENDANCE % */

        $attendanceData['Peer Review Score'] = 0;

        $checkpoints = $this->AssesmentCheckpoint->find('all', array('recursive' => -1));
        $criterias = $this->AssesmentCriteria->find('all', array('recursive' => -1));

        $this->loadModel('PeerAssesment');
        $assesments = $this->PeerAssesment->find('all', array(
            'conditions' => array(
                'PeerAssesment.student_id' => $student['Student']['id'],
                'PeerAssesment.field_group_id' => $student['FieldGroup']['id'],
            ),
            'recursive' => -1
        ));

        $result = $this->getAveragePeerAssesment($checkpoints, $criterias, $assesments, $student['Student']['id']);
        $assesmentByCriteria = $this->getAveragePeerAssesmentByCriteria($result, $criterias);

        $totlaCriterias = count($assesmentByCriteria);

        $totalAverage = 0; // store the sum of avaerage

        foreach($assesmentByCriteria as $byCriteria) {
            $totalPerCriteria = 0;
            foreach($byCriteria as $values) {
                $totalPerCriteria += $values['Score'];
            }

            if(count($byCriteria) != 0) {
                $totalAverage += $totalPerCriteria / count($byCriteria);
            } else {
                $totalAverage += 0;
            }

        }

        $attendanceData['Peer Review Score'] = round($totalAverage / $totlaCriterias, 1);


        $this->set(compact('student', 'attendanceData'));
    }

    public function addGeneralObjectives() {
        $student = $this->getLoggedStudent();

        $this->loadModel('HealthIssue');
        $healthIssues = $this->HealthIssue->find('all', array(
            'conditions' => array(
                'HealthIssue.field_community_id' =>  $student['FieldGroup']['field_community_id'],
            ),
            'recursive' => -1,
        ));

        $this->loadModel('GeneralObjective');
        $objectives = $this->GeneralObjective->find('all', array(
            'conditions' => array(
                'GeneralObjective.field_group_id' =>  $student['Student']['field_group_id'],
            ),
            //'recursive' => -1,
        ));

        if($this->request->is('post')) {
            $data = $this->request->data;

            $objectives = [];
            if(!empty($data) && !empty($data['GeneralObjectives'])) {
                foreach($data['GeneralObjectives'] as $issue) {
                    $temp['GeneralObjective']['health_issue_id'] = $issue['GeneralObjective']['health_issue_id'];
                    $temp['GeneralObjective']['field_community_id'] = $student['FieldGroup']['field_community_id'];
                    $temp['GeneralObjective']['field_group_id'] = $student['Student']['field_group_id'];
                    $temp['GeneralObjective']['objective'] = $issue['GeneralObjective']['objective'];
                    $temp['GeneralObjective']['percentage'] = $issue['GeneralObjective']['percentage'];

                    array_push($objectives, $temp);
                }

                $this->loadModel('GeneralObjective');
                if($this->GeneralObjective->saveMany($objectives)) {
                    $this->Session->setFlash(__('General Objectives added successfully!'), 'flashSuccess');
                    return $this->redirect(array('action' => 'addGeneralObjectives'));
                } else {
                    $this->Session->setFlash(__('Failed to add General Objectives'), 'flashError');
                    return $this->redirect(array('action' => 'addGeneralObjectives'));
                }
            }
        }


        $this->set(compact('student', 'healthIssues', 'objectives'));
    }

    public function addSpecificObjectives() {
        $student = $this->getLoggedStudent();

        $this->loadModel('GeneralObjective');
        $generalObjectives = $this->GeneralObjective->find('all', array(
            'conditions' => array(
                'GeneralObjective.field_community_id' =>  $student['FieldGroup']['field_community_id'],
            ),
            'recursive' => -1,
        ));

        $this->loadModel('SpecificObjective');
        $specificObjectives = $this->SpecificObjective->find('all', array(
            'conditions' => array(
                'SpecificObjective.field_community_id' =>  $student['FieldGroup']['field_community_id'],
            ),
            //'recursive' => -1,
        ));

        if($this->request->is('post')) {
            $data = $this->request->data;

            $objectives = [];
            if(!empty($data) && !empty($data['SpecificObjectives'])) {
                foreach($data['SpecificObjectives'] as $obj) {
                    $temp['SpecificObjective']['field_community_id'] = $student['FieldGroup']['field_community_id'];
                    $temp['SpecificObjective']['general_objective_id'] = $obj['SpecificObjective']['general_objective_id'];
                    $temp['SpecificObjective']['objective'] = $obj['SpecificObjective']['objective'];
                    $temp['SpecificObjective']['percentage'] = $obj['SpecificObjective']['percentage'];

                    array_push($objectives, $temp);
                }

                $this->loadModel('SpecificObjective');
                if($this->SpecificObjective->saveMany($objectives)) {
                    $this->Session->setFlash(__('Specific Objectives added successfully!'), 'flashSuccess');
                    return $this->redirect(array('action' => 'addSpecificObjectives'));
                } else {
                    $this->Session->setFlash(__('Failed to add Specific Objectives'), 'flashError');
                    return $this->redirect(array('action' => 'addSpecificObjectives'));
                }
            }
        }


        $this->set(compact('student', 'generalObjectives', 'specificObjectives'));
    }

    public function addHealthIssues() {
        $student = $this->getLoggedStudent();

        $this->loadModel('HealthIssue');
        $currentIssues = $this->HealthIssue->find('all', array(
            'conditions' => array(
                'HealthIssue.field_community_id' => $student['FieldGroup']['field_community_id'],
            ),
            'recursive' => -1
        ));

        if($this->request->is('post')) {
            $data = $this->request->data;

            $issues = [];
            if(!empty($data) && !empty($data['HealthIssues'])) {
                foreach($data['HealthIssues'] as $issue) {
                    $temp['HealthIssue']['field_community_id'] = $student['FieldGroup']['field_community_id'];
                    $temp['HealthIssue']['issue_name'] = $issue['HealthIssue']['issue_name'];
                    $temp['HealthIssue']['description'] = $issue['HealthIssue']['description'];

                    array_push($issues, $temp);
                }

                $this->loadModel('HealthIssue');
                if($this->HealthIssue->saveMany($issues)) {
                    $this->Session->setFlash(__('Health Issues added successfully!'), 'flashSuccess');
                    return $this->redirect(array('action' => 'addHealthIssues'));
                } else {
                    $this->Session->setFlash(__('Failed to add Health Issues'), 'flashError');
                    return $this->redirect(array('action' => 'addHealthIssues'));
                }
            }


        }

        $this->set(compact('student', 'currentIssues'));
    }

    public function addDeterminants() {
        $student = $this->getLoggedStudent();

        $this->loadModel('HealthIssue');
        $healthIssues = $this->HealthIssue->find('all', array(
            'conditions' => array(
                'HealthIssue.field_community_id' => $student['FieldGroup']['field_community_id'],
            ),
            'recursive' => -1
        ));

        $this->loadModel('Determinant');
        $determinants = $this->Determinant->find('all', array(
            'conditions' => array(
                'Determinant.field_community_id' => $student['FieldGroup']['field_community_id'],
            ),
            'recursive' => -1
        ));

        if($this->request->is('post')) {
            $data = $this->request->data;

            $issues = [];
            if(!empty($data) && !empty($data['Determinants'])) {
                foreach($data['Determinants'] as $determinant) {
                    $temp['Determinant']['field_community_id'] = $student['FieldGroup']['field_community_id'];
                    $temp['Determinant']['field_group_id'] = $student['Student']['field_group_id'];
                    $temp['Determinant']['health_issue_id'] = $determinant['Determinant']['health_issue_id'];
                    $temp['Determinant']['title'] = $determinant['Determinant']['title'];
                    $temp['Determinant']['description'] = $determinant['Determinant']['description'];

                    array_push($issues, $temp);
                }

                $this->loadModel('Determinant');
                if($this->Determinant->saveMany($issues)) {
                    $this->Session->setFlash(__('Determinants added successfully!'), 'flashSuccess');
                    return $this->redirect(array('action' => 'addDeterminants'));
                } else {
                    $this->Session->setFlash(__('Failed to add Determinants'), 'flashError');
                    return $this->redirect(array('action' => 'addDeterminants'));
                }
            }


        }

        $this->set(compact('student', 'healthIssues', 'determinants'));
    }

    public function setFieldCommunityArea() {
        $student = $this->getLoggedStudent();

        $this->loadModel('FieldCommunity');
        $community = $this->FieldCommunity->find('first', array(
            'conditions' => array(
                'FieldCommunity.id' => $student['FieldGroup']['field_community_id'],
            ),
            'recursive' => -1,
        ));

        $this->loadModel('FieldMapPoint');
        $pts = $this->FieldMapPoint->find('all', array(
            'conditions' => array(
                'FieldMapPoint.field_community_id' => $student['FieldGroup']['field_community_id'],
            ),
            'recursive' => -1,
        ));

        if(!empty($community) && !empty($pts)) {
            $this->Session->setFlash(__('<b>Important!</b> You have already added the details for your <b>Field Community</b>. That information is not allowed to add again.'), 'flashInfo');
            return $this->redirect(array('action' => 'index'));
        }



        if($this->request->is('post')) {
            $points = $this->request->data['FieldCommunity']['map_points'];
            $coords = explode('|', $points);

            $coordAry = [];
            foreach($coords as $coord) {
                if(!empty($coord)) {
                    $latLng = explode(',', $coord);
                    $temp['FieldMapPoint']['field_community_id'] = $student['FieldGroup']['field_community_id'];
                    $temp['FieldMapPoint']['point_lat']  = floatval($latLng[0]);
                    $temp['FieldMapPoint']['point_lng']  = floatval($latLng[1]);

                    array_push($coordAry, $temp);
                }
            }

            $this->loadModel('FieldMapPoint');
            $rtn = $this->FieldMapPoint->saveMany($coordAry);

            unset($this->request->data['FieldCommunity']['map_points']);
            $this->request->data['FieldCommunity']['field_group_id'] = $student['FieldGroup']['id'];

            $this->loadModel('FieldCommunity');
            //$this->FieldCommunity->create();
            $this->request->data['FieldCommunity']['id'] = $student['FieldGroup']['id'];
            $res = $this->FieldCommunity->save($this->request->data);

            if($rtn  && $res) {
                $this->Session->setFlash(__('Field Community Details was successfully saved!'), 'flashSuccess');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Failed to save Field Community Details'), 'flashError');
                return $this->redirect(array('action' => 'index'));
            }
        }

        $this->set(compact('student'));
    }

    public function addPopulationDistribution() {
        $student = $this->getLoggedStudent();

        $this->loadModel('FieldMapPoint');
        $mapPoints = $this->FieldMapPoint->find('all', array(
            'conditions' => array(
                'FieldMapPoint.field_community_id' => $student['FieldGroup']['field_community_id'],
            ),
            'recursive' => -1,
        ));
        $this->loadModel('FieldCommunity');
        $fieldCommunity = $this->FieldCommunity->find('first', array(
            'conditions' => array(
                'FieldCommunity.id' => $student['FieldGroup']['field_community_id'],
            ),
            'fields'=>array('village_name', 'title'),
            'recursive' => -1,
        ));

        if($this->request->is(array('post', 'put'))) {

            $this->loadModel('InitPopulation');
            if(!empty($this->request->data['InitPopulation']['id']))
                $this->InitPopulation->create();

            if($this->InitPopulation->save($this->request->data)) {
                $this->Session->setFlash(__('Population Details was successfully saved!'), 'flashSuccess');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Failed to save Population Details'), 'flashError');
                return $this->redirect(array('action' => 'index'));
            }

        } else {
            $this->loadModel('InitPopulation');
            $population = $this->InitPopulation->find('first', array(
                'conditions' => array(
                    'InitPopulation.field_community_id' => $student['FieldGroup']['field_community_id'],
                ),
                'recursive' => -1,
            ));

            if(!empty($population)) {
                $this->request->data = $population;
            }
        }

        $this->set(compact('student', 'mapPoints', 'fieldCommunity'));
    }

    public function addAgeDistribution() {

        if($this->request->is(array('post', 'put'))) {

            $this->loadModel('InitAgeDistribution');
            $this->InitAgeDistribution->create();
            if($this->InitAgeDistribution->saveMany($this->request->data)) {
                $this->Session->setFlash(__('Age Group Details was successfully saved!'), 'flashSuccess');
                return $this->redirect(array('action' => 'addAgeDistribution'));
            } else {
                $this->Session->setFlash(__('Failed to save Age Group Details'), 'flashError');
                return $this->redirect(array('action' => 'addAgeDistribution'));
            }


        } else {
            $student = $this->getLoggedStudent();

            $this->loadModel('FieldCommunity');
            $fieldCommunity = $this->FieldCommunity->find('first', array(
                'conditions' => array(
                    'FieldCommunity.id' => $student['FieldGroup']['field_community_id'],
                ),
                'fields'=>array('village_name', 'title'),
                'recursive' => -1,
            ));

            $this->loadModel('InitAgeDistribution');
            $ageGroups = $this->InitAgeDistribution->find('all', array(
                'conditions' => array(
                    'InitAgeDistribution.field_community_id' => $student['FieldGroup']['field_community_id'],
                ),
                //'fields'=>array('village_name', 'title'),
                'recursive' => -1,
            ));


            $this->set(compact('student', 'fieldCommunity', 'ageGroups'));
        }
    }

    public function addEducationLevel() {
        if($this->request->is(array('post', 'put'))) {

            $this->loadModel('InitEducationLevel');
            $this->InitEducationLevel->create();
            if($this->InitEducationLevel->saveMany($this->request->data)) {
                $this->Session->setFlash(__('Education Details was successfully saved!'), 'flashSuccess');
                return $this->redirect(array('action' => 'addEducationLevel'));
            } else {
                $this->Session->setFlash(__('Failed to save Education Details'), 'flashError');
                return $this->redirect(array('action' => 'addEducationLevel'));
            }


        } else {
            $student = $this->getLoggedStudent();

            $this->loadModel('FieldCommunity');
            $fieldCommunity = $this->FieldCommunity->find('first', array(
                'conditions' => array(
                    'FieldCommunity.id' => $student['FieldGroup']['field_community_id'],
                ),
                'fields'=>array('village_name', 'title'),
                'recursive' => -1,
            ));

            $this->loadModel('InitEducationLevel');
            $eduLevels = $this->InitEducationLevel->find('all', array(
                'conditions' => array(
                    'InitEducationLevel.field_community_id' => $student['FieldGroup']['field_community_id'],
                ),
                'recursive' => -1,
            ));


            $this->set(compact('student', 'fieldCommunity', 'eduLevels'));
        }

    }

    public function addFamilyIncome() {
        if($this->request->is(array('post', 'put'))) {

            $this->loadModel('InitIncome');
            $this->InitIncome->create();
            if($this->InitIncome->saveMany($this->request->data)) {
                $this->Session->setFlash(__('Income Details was successfully saved!'), 'flashSuccess');
                return $this->redirect(array('action' => 'addFamilyIncome'));
            } else {
                $this->Session->setFlash(__('Failed to save Income Details'), 'flashError');
                return $this->redirect(array('action' => 'addFamilyIncome'));
            }


        } else {
            $student = $this->getLoggedStudent();

            $this->loadModel('FieldCommunity');
            $fieldCommunity = $this->FieldCommunity->find('first', array(
                'conditions' => array(
                    'FieldCommunity.id' => $student['FieldGroup']['field_community_id'],
                ),
                'fields'=>array('village_name', 'title'),
                'recursive' => -1,
            ));

            $this->loadModel('InitIncome');
            $incomeRanges = $this->InitIncome->find('all', array(
                'conditions' => array(
                    'InitIncome.field_community_id' => $student['FieldGroup']['field_community_id'],
                ),
                'recursive' => -1,
            ));


            $this->set(compact('student', 'fieldCommunity', 'incomeRanges'));
        }
    }

    public function addOccupationDistribution() {
        if($this->request->is(array('post', 'put'))) {

            $this->loadModel('InitOccupation');
            $this->InitOccupation->create();
            if($this->InitOccupation->saveMany($this->request->data)) {
                $this->Session->setFlash(__('Occupation Details was successfully saved!'), 'flashSuccess');
                return $this->redirect(array('action' => 'addOccupationDistribution'));
            } else {
                $this->Session->setFlash(__('Failed to save Occupation Details'), 'flashError');
                return $this->redirect(array('action' => 'addOccupationDistribution'));
            }


        } else {
            $student = $this->getLoggedStudent();

            $this->loadModel('FieldCommunity');
            $fieldCommunity = $this->FieldCommunity->find('first', array(
                'conditions' => array(
                    'FieldCommunity.id' => $student['FieldGroup']['field_community_id'],
                ),
                'fields'=>array('village_name', 'title'),
                'recursive' => -1,
            ));

            $this->loadModel('InitOccupation');
            $occupations = $this->InitOccupation->find('all', array(
                'conditions' => array(
                    'InitOccupation.field_community_id' => $student['FieldGroup']['field_community_id'],
                ),
                'recursive' => -1,
            ));


            $this->set(compact('student', 'fieldCommunity', 'occupations'));
        }
    }
    
    public function addInputIndicators() {
        if($this->request->is(array('post', 'put'))) {
            $this->loadModel('InputIndicator');
            if($this->InputIndicator->saveMany($this->request->data)) {
                $this->Session->setFlash(__('Input Indicators was successfully saved!'), 'flashSuccess');
                return $this->redirect(array('action' => 'addInputIndicators'));
            } else {
                $this->Session->setFlash(__('Failed to save Input Indicators'), 'flashError');
                return $this->redirect(array('action' => 'addInputIndicators'));
            }

        } else {
            $student = $this->getLoggedStudent();

            $this->loadModel('FieldCommunity');
            $fieldCommunity = $this->FieldCommunity->find('first', array(
                'conditions' => array(
                    'FieldCommunity.id' => $student['FieldGroup']['field_community_id'],
                ),
                'fields'=>array('village_name', 'title'),
                'recursive' => -1,
            ));

            $this->loadModel('GeneralObjective');
            $generalObjectives = $this->GeneralObjective->find('all', array(
                'conditions' => array(
                    'GeneralObjective.field_community_id' => $student['FieldGroup']['field_community_id'],
                    'GeneralObjective.field_group_id' => $student['FieldGroup']['id'],
                ),
                'recursive' => -1,
            ));

            $this->loadModel('InputIndicator');
            $indicators = $this->InputIndicator->find('all', array(
                'conditions' => array(
                    'InputIndicator.field_group_id' => $student['FieldGroup']['id'],
                ),
                'recursive' => -1,
            ));

            $this->set(compact('student', 'generalObjectives', 'fieldCommunity', 'indicators'));
        }
    }

    public function addProcessIndicators() {
        if($this->request->is(array('post', 'put'))) {
            $this->loadModel('ProcessIndicator');
            if($this->ProcessIndicator->saveMany($this->request->data)) {
                $this->Session->setFlash(__('Process Indicators was successfully saved!'), 'flashSuccess');
                return $this->redirect(array('action' => 'addProcessIndicators'));
            } else {
                $this->Session->setFlash(__('Failed to save Process Indicators'), 'flashError');
                return $this->redirect(array('action' => 'addProcessIndicators'));
            }

        } else {
            $student = $this->getLoggedStudent();

            $this->loadModel('FieldCommunity');
            $fieldCommunity = $this->FieldCommunity->find('first', array(
                'conditions' => array(
                    'FieldCommunity.id' => $student['FieldGroup']['field_community_id'],
                ),
                'fields'=>array('village_name', 'title'),
                'recursive' => -1,
            ));

            $this->loadModel('GeneralObjective');
            $generalObjectives = $this->GeneralObjective->find('all', array(
                'conditions' => array(
                    'GeneralObjective.field_community_id' => $student['FieldGroup']['field_community_id'],
                    'GeneralObjective.field_group_id' => $student['FieldGroup']['id'],
                ),
                'recursive' => -1,
            ));

            $this->loadModel('ProcessIndicator');
            $indicators = $this->ProcessIndicator->find('all', array(
                'conditions' => array(
                    'ProcessIndicator.field_group_id' => $student['FieldGroup']['id'],
                ),
                'recursive' => -1,
            ));

            $this->set(compact('student', 'generalObjectives', 'fieldCommunity', 'indicators'));
        }
    }

    public function addOutputIndicators() {
        if($this->request->is(array('post', 'put'))) {
            $this->loadModel('OutputIndicator');
            if($this->OutputIndicator->saveMany($this->request->data)) {
                $this->Session->setFlash(__('Output Indicators was successfully saved!'), 'flashSuccess');
                return $this->redirect(array('action' => 'addOutputIndicators'));
            } else {
                $this->Session->setFlash(__('Failed to save Output Indicators'), 'flashError');
                return $this->redirect(array('action' => 'addOutputIndicators'));
            }

        } else {
            $student = $this->getLoggedStudent();

            $this->loadModel('FieldCommunity');
            $fieldCommunity = $this->FieldCommunity->find('first', array(
                'conditions' => array(
                    'FieldCommunity.id' => $student['FieldGroup']['field_community_id'],
                ),
                'fields'=>array('village_name', 'title'),
                'recursive' => -1,
            ));

            $this->loadModel('GeneralObjective');
            $generalObjectives = $this->GeneralObjective->find('all', array(
                'conditions' => array(
                    'GeneralObjective.field_community_id' => $student['FieldGroup']['field_community_id'],
                    'GeneralObjective.field_group_id' => $student['FieldGroup']['id'],
                ),
                'recursive' => -1,
            ));

            $this->loadModel('OutputIndicator');
            $indicators = $this->OutputIndicator->find('all', array(
                'conditions' => array(
                    'OutputIndicator.field_group_id' => $student['FieldGroup']['id'],
                ),
                'recursive' => -1,
            ));

            $this->set(compact('student', 'generalObjectives', 'fieldCommunity', 'indicators'));
        }
    }

    public function addOutcomeIndicators() {
        if($this->request->is(array('post', 'put'))) {
            $this->loadModel('OutcomeIndicator');
            if($this->OutcomeIndicator->saveMany($this->request->data)) {
                $this->Session->setFlash(__('Outcome Indicators was successfully saved!'), 'flashSuccess');
                return $this->redirect(array('action' => 'addOutcomeIndicators'));
            } else {
                $this->Session->setFlash(__('Failed to save Outcome Indicators'), 'flashError');
                return $this->redirect(array('action' => 'addOutcomeIndicators'));
            }

        } else {
            $student = $this->getLoggedStudent();

            $this->loadModel('FieldCommunity');
            $fieldCommunity = $this->FieldCommunity->find('first', array(
                'conditions' => array(
                    'FieldCommunity.id' => $student['FieldGroup']['field_community_id'],
                ),
                'fields'=>array('village_name', 'title'),
                'recursive' => -1,
            ));

            $this->loadModel('GeneralObjective');
            $generalObjectives = $this->GeneralObjective->find('all', array(
                'conditions' => array(
                    'GeneralObjective.field_community_id' => $student['FieldGroup']['field_community_id'],
                    'GeneralObjective.field_group_id' => $student['FieldGroup']['id'],
                ),
                'recursive' => -1,
            ));

            $this->loadModel('OutcomeIndicator');
            $indicators = $this->OutcomeIndicator->find('all', array(
                'conditions' => array(
                    'OutcomeIndicator.field_group_id' => $student['FieldGroup']['id'],
                ),
                'recursive' => -1,
            ));

            $this->set(compact('student', 'generalObjectives', 'fieldCommunity', 'indicators'));
        }
    }

    public function fieldCommunityOverview() {
        $student = $this->getLoggedStudent();

        $this->loadModel('HealthIssue');
        $healthIssues = $this->HealthIssue->find('all', array(
            'conditions' => array(
                'HealthIssue.field_community_id' => $student['FieldGroup']['field_community_id'],
            ),
            'recursive' => -1,
        ));

        $this->loadModel('GeneralObjective');
        $generalObjectives = $this->GeneralObjective->find('all', array(
            'conditions' => array(
                'GeneralObjective.field_community_id' => $student['FieldGroup']['field_community_id'],
            ),
            'recursive' => -1,
        ));

        $this->loadModel('SpecificObjective');
        $specificObjectives = $this->SpecificObjective->find('all', array(
            'conditions' => array(
                'SpecificObjective.field_community_id' => $student['FieldGroup']['field_community_id'],
            ),
            'recursive' => -1,
        ));

        $this->set(compact('student', 'healthIssues', 'generalObjectives', 'specificObjectives'));
    }

    public function viewGroupProgress() {
        $student = $this->getLoggedStudent();

        $groupProgressData = [];
        $groupProgressData['Members'] = [];
        $groupProgressData['Final Scores'] = [];

        $this->loadModel('Event');
        $this->loadModel('FieldVisit');
        $this->loadModel('FieldVisitAttendance');
        $this->loadModel('AssesmentCheckpoint');
        $this->loadModel('AssesmentCriteria');

        $groupMembers = $this->Student->find('all', array(
            'conditions' => array(
                'Student.field_group_id' => $student['FieldGroup']['id'],
            ),
            'recursive' => 1,
        ));

        $visitAttendances = $this->FieldVisitAttendance->find('all', array(
            'conditions' => array(
                'FieldVisitAttendance.field_group_id' =>  $student['FieldGroup']['id'],
//                'FieldVisitAttendance.student_id' =>  $student['Student']['id'],
            ),
            'recursive' => 1,
        ));

        $visits = $this->FieldVisit->find('all', array(
            'conditions' => array(
                'FieldVisit.field_community_id' =>  $student['FieldGroup']['field_community_id'],
                'FieldVisit.field_group_id' =>  $student['FieldGroup']['id'],
            ),
            'recursive' => 1,
        ));

        $events = $this->Event->find('all', array(
            'conditions' => array(
                'Event.field_community_id' =>  $student['FieldGroup']['field_community_id'],
                'Event.field_group_id' =>  $student['FieldGroup']['id'],
                'Event.complete' =>  1,
            ),
            'recursive' => 1,
        ));

        foreach($groupMembers as $member) {

            $grpMemberData = [];
            $grpMemberData['Scores'] = [];
            $grpMemberData['Student ID'] = $member['Student']['id'];
            $grpMemberData['Student Name'] = $member['Student']['first_name'] . ' ' . $member['Student']['last_name'];
            $grpMemberData['Student Photo'] = $member['Student']['profile_photo'];
            $completedVisitCount = 0;
            foreach($visits as $visit) {
                if((time() - strtotime($visit['FieldVisit']['date'])) > 0) {
                    $completedVisitCount++;
                }
            }

            $currentStdAttendance = 0;
            foreach($visitAttendances as $attendance) {
                if($attendance['FieldVisitAttendance']['student_id'] == $member['Student']['id']) {
                    if($attendance['FieldVisitAttendance']['confirmed'] == 1) {
                        if($attendance['FieldVisitAttendance']['attended'] == 1) {
                            $currentStdAttendance++;
                        }
                    }
                }
            }

            if($completedVisitCount != 0) {
                $grpMemberData['Scores']['Field Visit Attendance'] = round(($currentStdAttendance / $completedVisitCount) * 100, 1);
            } else {
                $grpMemberData['Scores']['Field Visit Attendance'] = 0;
            }

            /* END OF ATTENDANCE % */

            $grpMemberData['Scores']['Peer Review Score'] = 0;

            $checkpoints = $this->AssesmentCheckpoint->find('all', array('recursive' => -1));
            $criterias = $this->AssesmentCriteria->find('all', array('recursive' => -1));

            $this->loadModel('PeerAssesment');
            $assesments = $this->PeerAssesment->find('all', array(
                'conditions' => array(
                    'PeerAssesment.student_id' => $member['Student']['id'],
                    'PeerAssesment.field_group_id' => $member['FieldGroup']['id'],
                ),
                'recursive' => -1
            ));

            $result = $this->getAveragePeerAssesment($checkpoints, $criterias, $assesments, $member['Student']['id']);
            $assesmentByCriteria = $this->getAveragePeerAssesmentByCriteria($result, $criterias);

            $totlaCriterias = count($assesmentByCriteria);

            $totalAverage = 0; // store the sum of avaerage

            foreach($assesmentByCriteria as $byCriteria) {
                $totalPerCriteria = 0;
                foreach($byCriteria as $values) {
                    $totalPerCriteria += $values['Score'];
                }

                if(count($byCriteria) != 0) {
                    $totalAverage += $totalPerCriteria / count($byCriteria);
                } else {
                    $totalAverage += 0;
                }

            }

            if($totlaCriterias != 0) {
                $grpMemberData['Scores']['Peer Review Score'] = round($totalAverage / $totlaCriterias, 1);
            } else {
                $grpMemberData['Scores']['Peer Review Score'] = 0;
            }

            array_push($groupProgressData['Members'], $grpMemberData);
        }


        // Calculate Completed Events
        $totalCompletedEventCount = count($events);
        $totalEventScore = 0;
        foreach($events as $event) {
            $totalEventScore += $event['Score']['mark'];
        }

        if($totalCompletedEventCount != 0) {
            $groupProgressData['Final Scores']['Group Community Activity Score'] = round($totalEventScore / $totalCompletedEventCount, 1);
        } else {
            $groupProgressData['Final Scores']['Group Community Activity Score'] = 0;
        }


        $grpMemberCount = count($groupProgressData['Members']);
        $grTotalAttendance = 0;
        $grpTotalPeerReview = 0;
        foreach($groupProgressData['Members'] as $grpMember) {
            $grTotalAttendance += $grpMember['Scores']['Field Visit Attendance'];
            $grpTotalPeerReview += $grpMember['Scores']['Peer Review Score'];
        }

        $groupProgressData['Final Scores']['Group Attendance Score'] = round( $grTotalAttendance / $grpMemberCount, 1);
        $groupProgressData['Final Scores']['Group Peer Assessment Score'] = round( $grpTotalPeerReview / $grpMemberCount, 1);

        $finalTotal = 0;
        foreach($groupProgressData['Final Scores'] as $key => $value) {
            $finalTotal += $value;
        }

        $groupProgressData['Score'] = round($finalTotal / count($groupProgressData['Final Scores']), 1);

        $this->set(compact('student', 'groupProgressData'));
    }

    public function evalCheckpoints() {
        $student = $this->getLoggedStudent();

        $this->loadModel('HealthIssue');
        $healthIssues = $this->HealthIssue->find('all', array(
            'conditions' => array(
                'HealthIssue.field_community_id' =>  $student['FieldGroup']['field_community_id'],
            ),
            'recursive' => -1,
        ));

        $this->loadModel('ProgramEvalCheckpoint');
        $checkPoints = $this->ProgramEvalCheckpoint->find('all', array(
            'conditions' => array(
                'ProgramEvalCheckpoint.field_group_id' =>  $student['FieldGroup']['id'],
            ),
            'recursive' => -1,
        ));

        $this->set(compact('student','healthIssues', 'checkPoints'));
    }

    public function addEvaluationCheckpoints() {

        if($this->request->is(array('post', 'put'))) {
            $this->loadModel('ProgramEvalCheckpoint');
            if($this->ProgramEvalCheckpoint->saveMany($this->request->data)) {
                $this->Session->setFlash(__('Evaluation Checkpoints was successfully saved!'), 'flashSuccess');
                return $this->redirect(array('action' => 'addEvaluationCheckpoints'));
            } else {
                $this->Session->setFlash(__('Failed to save Evaluation Checkpoints'), 'flashError');
                return $this->redirect(array('action' => 'addEvaluationCheckpoints'));
            }
        } else {
            $student = $this->getLoggedStudent();

            $this->loadModel('HealthIssue');
            $healthIssues = $this->HealthIssue->find('all', array(
                'conditions' => array(
                    'HealthIssue.field_community_id' =>  $student['FieldGroup']['field_community_id'],
                ),
                'recursive' => -1,
            ));

            $this->loadModel('ProgramEvalCheckpoint');
            $checkPoints = $this->ProgramEvalCheckpoint->find('all', array(
                'conditions' => array(
                    'ProgramEvalCheckpoint.field_group_id' =>  $student['FieldGroup']['id'],
                ),
                'recursive' => -1,
            ));

            $this->set(compact('student','healthIssues', 'checkPoints'));
        }

    }

    public function addEvaluationIndicators() {
        if($this->request->is(array('post', 'put'))) {
            $this->loadModel('ProgramEvalIndicator');
            $this->ProgramEvalIndicator->create();
            if($this->ProgramEvalIndicator->save($this->request->data)) {
                $this->Session->setFlash(__('Evaluation Indicator was successfully saved!'), 'flashSuccess');
                return $this->redirect(array('action' => 'addEvaluationIndicators'));
            } else {
                $this->Session->setFlash(__('Failed to save Evaluation Indicator'), 'flashError');
                return $this->redirect(array('action' => 'addEvaluationIndicators'));
            }
        } else {
            $student = $this->getLoggedStudent();

            $this->loadModel('HealthIssue');
            $this->loadModel('ProgramEvalIndicatorGroup');
            $this->loadModel('ProgramEvalIndicator');

            $healthIssues = $this->HealthIssue->find('all', array(
                'conditions' => array(
                    'HealthIssue.field_community_id' =>  $student['FieldGroup']['field_community_id'],
                ),
                'recursive' => -1,
            ));

            $categories = $this->ProgramEvalIndicatorGroup->find('all', array(
                'conditions' => array(
                    'ProgramEvalIndicatorGroup.field_group_id' =>  $student['FieldGroup']['id'],
                ),
                'recursive' => -1,
            ));

            $indicators = $this->ProgramEvalIndicator->find('all', array(
                'conditions' => array(
                    'ProgramEvalIndicator.field_group_id' =>  $student['FieldGroup']['id'],
                ),
                'recursive' => -1,
            ));

            $this->set(compact('student','healthIssues', 'categories', 'indicators'));
        }
    }

    public function addEvaluationIndicatorGroups() {
        if($this->request->is(array('post', 'put'))) {
            $this->loadModel('ProgramEvalIndicatorGroup');
            if($this->ProgramEvalIndicatorGroup->saveMany($this->request->data)) {
                $this->Session->setFlash(__('Evaluation Indicator Groups were successfully saved!'), 'flashSuccess');
                return $this->redirect(array('action' => 'addEvaluationIndicatorGroups'));
            } else {
                $this->Session->setFlash(__('Failed to save Evaluation Indicator Groups'), 'flashError');
                return $this->redirect(array('action' => 'addEvaluationIndicatorGroups'));
            }
        } else {
            $student = $this->getLoggedStudent();

            $this->loadModel('HealthIssue');
            $healthIssues = $this->HealthIssue->find('all', array(
                'conditions' => array(
                    'HealthIssue.field_community_id' =>  $student['FieldGroup']['field_community_id'],
                ),
                'recursive' => -1,
            ));

            $this->loadModel('ProgramEvalIndicatorGroup');
            $categories = $this->ProgramEvalIndicatorGroup->find('all', array(
                'conditions' => array(
                    'ProgramEvalIndicatorGroup.field_group_id' =>  $student['FieldGroup']['id'],
                ),
                'recursive' => -1,
            ));

            $this->set(compact('student','healthIssues', 'categories'));
        }
    }

    public function evaluateProgram() {
        $student = $this->getLoggedStudent();

        $this->loadModel('HealthIssue');
        $this->loadModel('ProgramEvalCheckpoint');

        $healthIssues = $this->HealthIssue->find('all', array(
            'conditions' => array(
                'HealthIssue.field_community_id' =>  $student['FieldGroup']['field_community_id'],
            ),
            'recursive' => -1,
        ));

        $checkPoints = $this->ProgramEvalCheckpoint->find('all', array(
            'conditions' => array(
                'ProgramEvalCheckpoint.field_group_id' =>  $student['FieldGroup']['id'],
            ),
            'recursive' => -1,
        ));

        $this->set(compact('student', 'healthIssues', 'checkPoints'));
    }

    public function evaluateCategory($issueId = null, $categoryId = null, $checkpointId = null) {
        if($this->request->is(array('post', 'put'))) {
            $this->loadModel('ProgramEvalIndicatorValue');
            if($this->ProgramEvalIndicatorValue->saveMany($this->request->data)) {
                $this->Session->setFlash(__('Evaluation successfully saved!'), 'flashSuccess');
                return $this->redirect(array('action' => 'evaluateProgram'));
            } else {
                $this->Session->setFlash(__('Failed to save Evaluation'), 'flashError');
                return $this->redirect(array('action' => 'evaluateProgram'));
            }
        } else {
            if(empty($issueId) && empty($categoryId) && empty($checkpointId)) {
                $this->Session->setFlash(__('Failed to find Indicator'), 'flashError');
                return $this->redirect(array('action' => 'evaluateProgram'));
            } else {
                $student = $this->getLoggedStudent();
                $this->loadModel('ProgramEvalCheckpoint');

                $checkpoint = $this->ProgramEvalCheckpoint->find('first', array(
                    'conditions' => array(
                        'ProgramEvalCheckpoint.id' =>  $checkpointId,
                    ),
                    'recursive' => -1,
                ));

                $checkpointTime = strtotime($checkpoint['ProgramEvalCheckpoint']['date']);
                if((time() - $checkpointTime) < 0)  {
                    $this->Session->setFlash(__('The Evaluation Checkpoint is not yet reached. The system assumes that you are evaluating ahead of time. Please evaluate the Program after the date of the checkpoint.'), 'flashInfo');
                    return $this->redirect(array('action' => 'evaluateProgram'));
                }

                $this->loadModel('HealthIssue');
                $this->loadModel('ProgramEvalIndicatorGroup');
                $this->loadModel('ProgramEvalIndicator');


                $healthIssue = $this->HealthIssue->find('first', array(
                    'conditions' => array(
                        'HealthIssue.id' =>  $issueId,
                    ),
                    'fields' => array('issue_name'),
                    'recursive' => -1,
                ));

                $category = $this->ProgramEvalIndicatorGroup->find('first', array(
                    'conditions' => array(
                        'ProgramEvalIndicatorGroup.id' =>  $categoryId,
                    ),
                    'fields' => array('category'),
                    'recursive' => -1,
                ));


                $indicators = $this->ProgramEvalIndicator->find('all', array(
                    'conditions' => array(
                        'ProgramEvalIndicator.field_group_id' =>  $student['FieldGroup']['id'],
                        'ProgramEvalIndicator.health_issue_id' =>  $issueId,
                        'ProgramEvalIndicator.program_eval_indicator_group_id' =>  $categoryId,
                    ),
                    'recursive' => -1,
                ));

                $this->set(compact('student','healthIssue', 'category', 'indicators', 'checkpoint'));
            }
        }
    }
    
    public function planFieldVisit(){
        if($this->request->is(array('post', 'put'))) {
            $this->loadModel('FieldVisit');
            if($this->FieldVisit->saveMany($this->request->data)) {
                $this->Session->setFlash(__('Field Visits were successfully saved!'), 'flashSuccess');
                return $this->redirect(array('action' => 'planFieldVisit'));
            } else {
                $this->Session->setFlash(__('Failed to save Field Visits'), 'flashError');
                return $this->redirect(array('action' => 'planFieldVisit'));
            }
        } else {
            $student = $this->getLoggedStudent();
            $visitsAry = [];
            $visitsAry['Completed'] = [];
            $visitsAry['Coming'] = [];

            $this->loadModel('FieldVisit');

            $visits = $this->FieldVisit->find('all', array(
                'conditions' => array(
                    'FieldVisit.field_community_id' =>  $student['FieldGroup']['field_community_id'],
                    'FieldVisit.field_group_id' =>  $student['FieldGroup']['id'],
                ),
                'recursive' => -1,
            ));

            foreach($visits as $visit) {
                if((time() - strtotime($visit['FieldVisit']['date'])) > 0) {
                    array_push( $visitsAry['Completed'], $visit);
                } else {
                    array_push( $visitsAry['Coming'], $visit);
                }
            }



            $this->set(compact('student','visitsAry'));
        }
    }


    public function markYourAttendance() {
        if($this->request->is(array('post', 'put'))) {
            $this->loadModel('FieldVisitAttendance');
            $this->FieldVisitAttendance->create();
            if($this->request->data['FieldVisitAttendance']['attended'] == 'on') {
                $this->request->data['FieldVisitAttendance']['attended'] = 1;
            }

            if($this->FieldVisitAttendance->save($this->request->data)) {
                $this->Session->setFlash(__('Attendance were successfully saved!'), 'flashSuccess');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Failed to save Attendance'), 'flashError');
                return $this->redirect(array('action' => 'index'));
            }
        } else {
            $student = $this->getLoggedStudent();

            $this->loadModel('FieldVisit');

            $visits = $this->FieldVisit->find('all', array(
                'conditions' => array(
                    'FieldVisit.field_community_id' =>  $student['FieldGroup']['field_community_id'],
                    'FieldVisit.field_group_id' =>  $student['FieldGroup']['id'],
                ),
                'recursive' => 1,
            ));

            $value = 10000000;
            $temp = 0;
            $mostRecent = null;
            foreach($visits as $visit) {

//                if((time() - strtotime($visit['FieldVisit']['date'])) > 0 && (empty($visit['FieldVisitAttendance']) || $visit['FieldVisitAttendance']['student_id'] != $student['Student']['id'])) {
                if((time() - strtotime($visit['FieldVisit']['date'])) > 0) {
                    if(empty($visit['FieldVisitAttendance'])) {
                        $temp = abs(time() - strtotime($visit['FieldVisit']['date']));
                        if($temp < $value) {
                            $value = $temp;
                            $mostRecent = $visit;
                        }
                    } else {
                        $marked = 0;
                        foreach($visit['FieldVisitAttendance'] as $attentance) {
                            if($attentance['student_id'] == $student['Student']['id']) {
                                $marked++;
                            }
                        }
                        if($marked == 0) {
                            $temp = abs(time() - strtotime($visit['FieldVisit']['date']));
                            if($temp < $value) {
                                $value = $temp;
                                $mostRecent = $visit;
                            }
                        }
                    }

                }
            }

            if(empty($mostRecent)) {
                $this->Session->setFlash(__('There are no unmarked attendance for previous field visits'), 'flashInfo');
                return $this->redirect(array('action' => 'index'));
            }

            $this->set(compact('student', 'mostRecent', 'visits'));
        }
    }

    public function confirmMembersAttendance() {
        $student = $this->getLoggedStudent();

        if($this->request->is(array('post', 'put'))) {
            $this->loadModel('FieldVisitConfirm');
            $dataAry = [];
            foreach($this->request->data as $data) {
                if($data['FieldVisitConfirm']['correct'] == 'on') {
                    $data['FieldVisitConfirm']['correct'] = 1;
                }
                array_push($dataAry, $data);
            }

            if($this->FieldVisitConfirm->saveAll($dataAry)) {

                $this->loadModel('FieldVisitAttendance');
                $visitAttendances = $this->FieldVisitAttendance->find('all', array(
                    'conditions' => array(
                        'FieldVisitAttendance.field_group_id' =>  $student['FieldGroup']['id'],
                        'FieldVisitAttendance.confirmed' =>  0,
                    ),
                    'recursive' => 1,
                ));

                $modAttendance = [];
                foreach($visitAttendances as $attendance) {
                    if(!empty($attendance['FieldVisitConfirm'])) {
                        if(count($attendance['FieldVisitConfirm']) == 2) {
                            $temp['FieldVisitAttendance']['id'] = $attendance['FieldVisitAttendance']['id'];
                            $temp['FieldVisitAttendance']['confirmed'] = 1;

                            array_push($modAttendance, $temp);
                        }
                    }
                }

                $res = false;
                if(!empty($modAttendance)) {
                    $res = $this->FieldVisitAttendance->saveAll($modAttendance);
                }

                if($res) {
                    $this->Session->setFlash(__('Confirmation successful!'), 'flashSuccess');
                    return $this->redirect(array('action' => 'index'));
                }

            } else {
                $this->Session->setFlash(__('Failed to save Confirmation'), 'flashError');
                return $this->redirect(array('action' => 'index'));
            }
        } else {
            $needsConfirming = [];

            $this->loadModel('FieldVisitAttendance');
//            $this->loadModel('FieldVisitConfirm');
            $this->loadModel('FieldVisit');

            $visits = $this->FieldVisit->find('all', array(
                'conditions' => array(
                    'FieldVisit.field_group_id' =>  $student['FieldGroup']['id'],
                ),
                'recursive' => 1,
            ));


            $visitAttendances = $this->FieldVisitAttendance->find('all', array(
                'conditions' => array(
                    'FieldVisitAttendance.field_group_id' =>  $student['FieldGroup']['id'],
                    'FieldVisitAttendance.confirmed' =>  0,
                ),
                'recursive' => 1,
            ));

            foreach($visitAttendances as $attendance) {
                if(empty($attendance['FieldVisitConfirm'])) {
                    array_push($needsConfirming, $attendance);
                } else {

                    if(count($attendance['FieldVisitConfirm']) < 2) {
                        foreach($attendance['FieldVisitConfirm'] as $confirms) {
                            if($confirms['confirmer'] != $student['Student']['id']) {
                                array_push($needsConfirming, $attendance);
                            }
                        }
                    }


                }
            }

            $this->set(compact('student','visitAttendances', 'needsConfirming', 'visits'));
        }
    }

    public function viewAttendanceProgress() {
        $student = $this->getLoggedStudent();
        $attendanceData = [];

        $this->loadModel('FieldVisit');
        $this->loadModel('FieldVisitAttendance');

        $visitAttendances = $this->FieldVisitAttendance->find('all', array(
            'conditions' => array(
                'FieldVisitAttendance.field_group_id' =>  $student['FieldGroup']['id'],
//                'FieldVisitAttendance.student_id' =>  $student['Student']['id'],
            ),
            'recursive' => 1,
        ));

        $students = $this->Student->find('all', array(
            'conditions' => array(
                'Student.field_group_id' => $student['FieldGroup']['id']
            ),
            'recursive' => -1
        ));


        $visits = $this->FieldVisit->find('all', array(
            'conditions' => array(
                'FieldVisit.field_community_id' =>  $student['FieldGroup']['field_community_id'],
                'FieldVisit.field_group_id' =>  $student['FieldGroup']['id'],
            ),
            'recursive' => 1,
        ));

        // Calculate Completed Events
        $completedVisitCount = 0;
        foreach($visits as $visit) {
            if((time() - strtotime($visit['FieldVisit']['date'])) > 0) {
                $completedVisitCount++;
            }
        }

        $attendanceData['completed_visits'] = $completedVisitCount;
        $attendanceData['total_visits'] = count($visits);


        $currentStdAttendance = 0;
        $grpStdCount = count($students);
        $attendanceData['VisitTable'] = [];
        foreach($visitAttendances as $attendance) {
            if($attendance['FieldVisitAttendance']['student_id'] == $student['Student']['id']) {
                if($attendance['FieldVisitAttendance']['confirmed'] == 1) {
                    $visitRecord['date'] = $attendance['FieldVisit']['date'];
                    $visitRecord['status'] = $attendance['FieldVisitAttendance']['attended'] == 1 ? 'Attended' : 'Absent';

                    if($attendance['FieldVisitAttendance']['attended'] == 1) {
                        $currentStdAttendance++;
                    }

                    $grpCount = 0;
                    foreach($visitAttendances as $attendance2) {
                        if($attendance2['FieldVisitAttendance']['field_visit_id'] == $attendance['FieldVisitAttendance']['field_visit_id']) {
                            if($attendance2['FieldVisitAttendance']['confirmed'] == 1 && $attendance2['FieldVisitAttendance']['attended'] == 1) {
                                $grpCount++;
                            }
                        }
                    }
                    $visitRecord['group_attendance'] =  round(($grpCount / $grpStdCount) * 100, 2);
                    array_push($attendanceData['VisitTable'], $visitRecord);
                }
            }
        }


        if($completedVisitCount != 0) {
            $attendanceData['percentage'] = round(($currentStdAttendance / $completedVisitCount) * 100, 2);
        } else {
            $attendanceData['percentage'] = 0;
        }

        $this->set(compact('student', 'visitAttendances', 'attendanceData'));
    }

}
