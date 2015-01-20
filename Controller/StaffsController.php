<?php
App::uses('AppController', 'Controller');

/**
 * Staffs Controller
 *
 * @property Staff $Staff
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class StaffsController extends AppController
{
    public $components = array('Paginator', 'Session', 'Auth');

    public function beforeFilter() {
        //$this->Auth->allow();
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->set('staff', $this->getLoggedStaff());
    }


    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Staff->exists($id)) {
            throw new NotFoundException(__('Invalid staff'));
        }
        $options = array('conditions' => array('Staff.' . $this->Staff->primaryKey => $id));
        $this->set('staff', $this->Staff->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->Staff->create();
            if ($this->Staff->save($this->request->data)) {
                $this->Session->setFlash(__('The staff has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The staff could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null)
    {
        if (!$this->Staff->exists($id)) {
            throw new NotFoundException(__('Invalid staff'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Staff->save($this->request->data)) {
                $this->Session->setFlash(__('The staff has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The staff could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Staff.' . $this->Staff->primaryKey => $id));
            $this->request->data = $this->Staff->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null)
    {
        $this->Staff->id = $id;
        if (!$this->Staff->exists()) {
            throw new NotFoundException(__('Invalid staff'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Staff->delete()) {
            $this->Session->setFlash(__('The staff has been deleted.'));
        } else {
            $this->Session->setFlash(__('The staff could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function register()
    {
        if ($this->request->is('post')) {

            $user['User']['role'] = 'Staff';
            $user['User']['username'] = $this->request->data['Staff']['username'];
            $user['User']['password'] = $this->request->data['Staff']['password'];

            $this->Staff->User->create();
            $user = $this->Staff->User->save($user);

            $this->request->data['Staff']['user_id'] = $user['User']['id'];

            $this->Staff->create();
            $student = $this->Staff->save($this->request->data);


            if ($user != null && $student != null) {
                $this->Session->setFlash(__('<b>Congratulations!</b>  You are now registered. Please wait for account approval.'), 'flashSuccess');
                return $this->redirect(array('controller' => 'pages', 'action' => 'home'));
            } else {
                $this->Session->setFlash(__('Oopz! Registration failed. Please try again.'), 'flashError');
                return $this->redirect(array('controller' => 'pages', 'action' => 'home'));
            }

        }
    }

    public function createProfile() {

    }

    public function editProfile() {

    }

    public function changePassword() {

    }

    public function viewFieldGroups() {
        $this->set('staff', $this->getLoggedStaff());

        $this->loadModel('FieldGroup');
        $groups = $this->FieldGroup->find('all', array(
            'recursive' => -1
        ));



        $this->set(compact('groups'));
    }

    public function viewGroup($id = null) {
        if($id != null) {
            $this->set('staff', $this->getLoggedStaff());

            // Get Field Group
            $this->loadModel('FieldGroup');
            $group = $this->FieldGroup->find('first', array(
                'conditions' => array(
                    'FieldGroup.id' => $id,
                ),
                'recursive' => -1
            ));

            // Get Group Members
            $this->loadModel('Student');
            $groupMembers = $this->Student->find('all', array(
                'conditions' => array(
                    'Student.field_group_id' => $id,
                ),
                'recursive' => -1
            ));

            // Get Field Community Info
            $this->loadModel('FieldCommunity');
            $fieldCommunity = $this->FieldCommunity->find('first', array(
                'conditions' => array(
                    'FieldCommunity.id' => $group['FieldGroup']['field_community_id'],
                ),
                'recursive' => -1
            ));

            // Get All Community Activities
            $this->loadModel('Event');
            $allEvents = $this->Event->find('all', array(
                'conditions' => array(
                    'Event.field_group_id' => $id,
                ),
                'recursive' => 2,
            ));



            $this->set(compact('group', 'fieldCommunity', 'groupMembers', 'allEvents'));
        } else {
            $this->Session->setFlash(__('Field Group not Found!'), 'flashError');
            $this->redirect(array('action' => 'viewFieldGroups'));
        }
    }

    public function viewFieldCommunityStats($id = null) {
        if($id != null) {
            $this->set('staff', $this->getLoggedStaff());

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


                $this->set('community', $community);
            }

        } else {
            $this->Session->setFlash(__('Field Community not Found!'), 'flashError');
            $this->redirect(array('action' => 'viewGroup'));
        }
    }


    public function viewGroupMember($grpId, $stdId) {
        $this->set(compact('grpId', 'stdId'));
    }

    public function viewCompletedActivity($grpId, $actId) {
        if($grpId != null && $actId != null) {
            $this->set('staff', $this->getLoggedStaff());

            $this->loadModel('Event');
            $event = $this->Event->find('first', array(
                'conditions' => array(
                    'Event.field_group_id' => $grpId,
                    'Event.id' => $actId,
                ),
            ));

            $this->loadModel('EventFeedback');
            $eventFeedbacks = $this->EventFeedback->find('all', array(
                'conditions' => array(
                    'EventFeedback.event_id' => $actId,
                ),
            ));


            $this->set(compact('event', 'eventFeedbacks'));

            if($this->request->is('post')) {
                // Save Feedback
                if(!empty($this->request->data['EventFeedback'])) {
                    $this->loadModel('EventFeedback');
                    $this->EventFeedback->create();
                    if(($this->EventFeedback->save($this->request->data)) != null) {
                        $this->Session->setFlash(__('Feedback is successfully sent!'), 'flashSuccess');
                        return $this->redirect(array('action' => 'viewCompletedActivity', $grpId, $actId, '#' => 'feedback-area'));
                    } else {
                        $this->Session->setFlash(__('Failed to send feedback'), 'flashError');
                        return $this->redirect(array('action' => 'viewCompletedActivity', $grpId, $actId, '#' => 'feedback-area'));
                    }
                }

                // Save Score
                if(!empty($this->request->data['Score'])) {
                    // Find if score exixts
                    $this->loadModel('Event');
                    $event = $this->Event->find('first', array(
                        'conditions' => array(
                            'Event.id' => $actId,
                        ),
//                        'recursive' => -1,
                    ));

                    if(empty($event['Event']['score_id'])) {
                        // add
                        $this->loadModel('Score');
                        $this->Score->create();
                        $res = $this->Score->save($this->request->data);
                        if($res != null) {
                            // Save the ID to event
                            $event['Event']['score_id'] = $res['Score']['id'];
                            $this->loadModel('Event');
                            $this->Event->save($event);

                            $this->Session->setFlash(__('Rating is successfully stored!'), 'flashSuccess');
                            return $this->redirect(array('action' => 'viewCompletedActivity', $grpId, $actId, '#' => 'feedback-area'));
                        } else {
                            $this->Session->setFlash(__('Failed to store Rating'), 'flashError');
                            return $this->redirect(array('action' => 'viewCompletedActivity', $grpId, $actId, '#' => 'feedback-area'));
                        }

                    } else {
                        // update
                        $this->request->data['Score']['id'] = $event['Score']['id'];

                        $this->loadModel('Score');
                        if($this->Score->save($this->request->data) != null) {
                            $this->Session->setFlash(__('Rating is successfully updated!'), 'flashSuccess');
                            return $this->redirect(array('action' => 'viewCompletedActivity', $grpId, $actId, '#' => 'feedback-area'));
                        } else {
                            $this->Session->setFlash(__('Failed to update Rating'), 'flashError');
                            return $this->redirect(array('action' => 'viewCompletedActivity', $grpId, $actId, '#' => 'feedback-area'));
                        }

                    }
                }
            }

        } else {
            $this->Session->setFlash(__('Community Activity not Found!'), 'flashError');
            $this->redirect(array('action' => 'viewGroup', $grpId));
        }
    }

    public function viewPendingActivity($grpId, $actId) {
        if($grpId != null && $actId != null) {
            $this->set('staff', $this->getLoggedStaff());

            $this->loadModel('Event');
            $event = $this->Event->find('first', array(
                'conditions' => array(
                    'Event.field_group_id' => $grpId,
                    'Event.id' => $actId,
                ),
            ));

            $this->loadModel('EventFeedback');
            $eventFeedbacks = $this->EventFeedback->find('all', array(
                'conditions' => array(
                    'EventFeedback.event_id' => $actId,
                ),
            ));

            $this->set(compact('event', 'eventFeedbacks'));

            if($this->request->is('post')) {
                // Save Feedback
                if(!empty($this->request->data['EventFeedback'])) {
                    $this->loadModel('EventFeedback');
                    $this->EventFeedback->create();
                    if(($this->EventFeedback->save($this->request->data)) != null) {
                        $this->Session->setFlash(__('Feedback is successfully sent!'), 'flashSuccess');
                        return $this->redirect(array('action' => 'viewPendingActivity', $grpId, $actId, '#' => 'feedback-area'));
                    } else {
                        $this->Session->setFlash(__('Failed to send feedback'), 'flashError');
                        return $this->redirect(array('action' => 'viewPendingActivity', $grpId, $actId, '#' => 'feedback-area'));
                    }
                }

            }


        } else {
            $this->Session->setFlash(__('Community Activity not Found!'), 'flashError');
            $this->redirect(array('action' => 'viewGroup', $grpId));
        }
    }



    /* PRIVATE HELPER FUNCTION */

    private function getLoggedStaff()
    {
        $user = AuthComponent::user();
        if ($user['role'] == 'Staff') {
            $options = array('conditions' => array('Staff.user_id' => $user['id']));
            return $loggedStaff = $this->Staff->find('first', $options);
        } else {
            return $this->redirect(array('controller' => 'users', 'action' => 'redirectLoggedUser'));
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

}
