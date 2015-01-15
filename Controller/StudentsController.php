<?php
App::uses('AppController', 'Controller');
App::uses('Folder','Utility');

class StudentsController extends AppController {
    //public $components = array('Auth');
    public $components = array('HighCharts.HighCharts');


    public function beforeFilter() {
        //$this->Auth->allow('register');
        $this->Auth->allow();
    }

    public function index() {
        // set the student in the view
        $logged = AuthComponent::user();
        $student = $this->getLoggedStudent($logged['id']);
        $this->set('student', $student );

        // Set the field community
        $fieldCommunityId = $student['FieldGroup']['field_community_id'];
        $this->loadModel('FieldCommunity');
        $community = $this->FieldCommunity->find('first', array(
            'conditions' => array(
                'id' => $fieldCommunityId
            ),
            'recursive' => -1,
        ));
        $this->set('fieldCommunity', $community);

    }

    public function view($id = null) {
        if ($id == null) {
            throw new NotFoundException(__('Invaild UserID, NULL Passed'));
        }       
        $this->set('student',  $this->getLoggedStudent($id));
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
        if (!$this->Student->exists($id)) {
            throw new NotFoundException(__('Invalid student'));
        }
        
        
        $options = array('conditions' => array('Student.' . $this->Student->primaryKey => $id));
        $std = $this->Student->find('first', $options);
        
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
        $message = null;
        $element = null;
        
        // set the student in the view
        $logged = AuthComponent::user();
        $this->set('student',  $this->getLoggedStudent($logged['id']));
        
        if (!$grp_id) {            
            $message = 'Something went wrong, Can not find field group members';
            $element = 'flashError';
            $this->Session->setFlash(__($message), $element);
            return;
        }
        
        $options = array('conditions' => array('Student.' . 'field_group_id' => $grp_id));
        $this->set('grpStudents', $this->Student->find('all', $options));
    }
    
    // View Student Group Members Profile
    
    public function viewMemberProfile($id = null) {
        // set the student in the view
        $logged = AuthComponent::user();
        $this->set('student',  $this->getLoggedStudent($logged['id']));
        
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
    
    public function viewGroupProgress(){
        // set the student in the view
        $logged = AuthComponent::user();
        $this->set('student',  $this->getLoggedStudent($logged['id']));
    }
    
    // View My Progress
    
    public function viewProgress() {
        // set the student in the view
        $logged = AuthComponent::user();
        $student = $this->getLoggedStudent($logged['id']);
        $this->set('student', $student );

        // Set the field community
        $fieldCommunityId = $student['FieldGroup']['field_community_id'];

        $this->loadModel('Household');
        $households =  $this->Household->find('all', array(
            'conditions' => array(
                'field_community_id' => $fieldCommunityId,
            ),
            'recursive' => -1
        ));

        $this->set('households', $households);
    }

    public function viewHousehold($id = null) {
        // set the student in the view
        if($id != null) {
            $logged = AuthComponent::user();
            $student = $this->getLoggedStudent($logged['id']);
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
            $logged = AuthComponent::user();
            $student = $this->getLoggedStudent($logged['id']);
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
        $logged = AuthComponent::user();
        $student =  $this->getLoggedStudent($logged['id']);
        $this->set('student', $student);




    }

    public function viewFieldCommunity($id = null) {
        if($id) {
            // set the student in the view
            $logged = AuthComponent::user();
            $student =  $this->getLoggedStudent($logged['id']);
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
        $logged = AuthComponent::user();
        $this->set('student',  $this->getLoggedStudent($logged['id']));
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

                if($id!=null){
                    if(file_exists($folderName.DS.$id)){
                        chmod($folderName.DS.$id,0755);
                        unlink($folderName.DS.$id);
                    }
                }

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
        
        private function getLoggedStudent($id) {
            $user = AuthComponent::user();
            if ($user['role'] == 'Student') {
                $options = array('conditions' => array('Student.user_id' => $id));
                return $loggedstudent = $this->Student->find('first', $options);            
            } else {
                return $this->redirect(array( 'controller' => 'users', 'action' => 'redirectLoggedUser'));
            }
        }

    
    
    
    
    
    
    
    
}
