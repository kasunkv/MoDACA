<?php
App::uses('AppController', 'Controller');
App::uses('Folder','Utility');

class StudentsController extends AppController {
    //public $components = array('Auth');
    
    public function beforeFilter() {
        //$this->Auth->allow('register');
        $this->Auth->allow();
    }

    public function index() {
//        $this->Student->recursive = 0;
//        $this->set('students', $this->Paginator->paginate());
        
        // set the student in the view
        $logged = AuthComponent::user();
        $student = $this->getLoggedStudent($logged['id']);
        $this->set('student', $student );
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
                return $this->redirect(array('action' => 'index'));
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
    
    public function viewMyProgress() {
        // set the student in the view
        $logged = AuthComponent::user();
        $this->set('student',  $this->getLoggedStudent($logged['id']));
    }

    public function viewFieldGroup(){
        // set the student in the view
        $logged = AuthComponent::user();
        $student =  $this->getLoggedStudent($logged['id']);
        $this->set('student', $student);


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
