<?php

App::uses('AppController', 'Controller');
App::uses('SendEmail', 'Lib');
App::uses('Folder','Utility');

/**
 * Administrators Controller
 *
 * @property Administrator $Administrator
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AdministratorsController extends AppController {
   // public $components = array('Auth');
    
    public function beforeFilter() {
        //$this->Auth->allow();
    }

    public function index() {
        $this->set('administrator', $this->getLoggedAdmin());

        $this->loadModel('User');
        $users = $this->User->find('all', array(
            'conditions' => array(
                'User.approved' => 0,
            ),
            'recursive' => -1,
        ));

        $allApprovals = $users;
        $this->set('approvals', $allApprovals);

        $users = $this->User->find('all', array(
            'recursive' => -1,
        ));

        $students = array();
        $lecturers = array();

        foreach($users as $user) {
            if($user['User']['role'] == 'Student') {
                array_push($students, $user);
            } else if($user['User']['role'] == 'Staff') {
                array_push($lecturers, $user);
            }
        }

        $this->set('students', $students);
        $this->set('lec', $lecturers);

    }

    public function view($id = null) {
        if (!$this->Administrator->exists($id)) {
            throw new NotFoundException(__('Invalid administrator'));
        }
        $options = array('conditions' => array('Administrator.' . $this->Administrator->primaryKey => $id));
        $this->set('administrator', $this->Administrator->find('first', $options));
    }

    public function add() {
        if($this->request->is('post'))
        {
            $this->Administrator->create();
            if ($this->Administrator->save($this->request->data)) 
            {
                $this->Session->setFlash(__('The administrator has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } 
            else
            {
                $this->Session->setFlash(__('The administrator could not be saved. Please, try again.'));
                //debug($this->Administrator->validationErrors);
            }
        }
    }

    public function editAdminProfile() {
        
        if ($this->request->is(array('post', 'put'))) {
            $loggedAdmin = $this->getLoggedAdmin();
            $this->Administrator->id = $loggedAdmin['Administrator']['id'];

            $options = array('conditions' => array('Administrator.' . $this->Administrator->primaryKey => $this->Administrator->id));
            $admin = $this->Administrator->find('first', $options);


            if ($this->request->data['Administrator']['profile_photo']['error'] === UPLOAD_ERR_NO_FILE) {
                $this->request->data['Administrator']['profile_photo'] = $admin['Administrator']['profile_photo'];
                if ($this->Administrator->save($this->request->data)) {
                    $this->Session->setFlash('Your Profile was <b>Successfully</b> Updated.', 'flashSuccess');
                    return $this->redirect(array('action' => 'viewProfile'));
                } else {
                    $this->Session->setFlash('Oopz, Something went Wrong. Your Profile was <b>NOT</b> Updated. Please, try again.', 'flashError');
                    return $this->redirect(array('action' => 'viewProfile'));
                }
            } else {
                if($this->uploadPhoto($this->request->data['Administrator']['profile_photo'])) {
                    $this->request->data['Administrator']['id'] = $loggedAdmin['Administrator']['id'];
                    if ($this->Administrator->save($this->request->data)) {
                        $this->Session->setFlash('Your Profile was <b>Successfully</b> Updated.', 'flashSuccess');
                        return $this->redirect(array('action' => 'viewProfile'));
                    } else {
                        $this->Session->setFlash('Oopz, Something went Wrong. Your Profile was <b>NOT</b> Updated. Please, try again.', 'flashError');
                        return $this->redirect(array('action' => 'viewProfile'));
                    }
                } else {
                    $this->Administrator->save($this->request->data);
                    $this->Session->setFlash('Oopz, Something went Wrong. Profile Picture Upload Failed. Your Profile was <b>NOT</b> Updated. Please, try again.', 'flashError');
                    return $this->redirect(array('action' => 'viewProfile'));
                }
            }

//            if ($this->Administrator->save($this->request->data)) {
//                $this->Session->setFlash(__('The Profile was <b>Successfully</b> Updated.'), 'flashSuccess');
//                return $this->redirect(array('action' => 'viewProfile'));
//            } else {
//                $this->Session->setFlash(__('Oopz, Something went Wrong. The Profile was <b>NOT</b> Updated. Please, try again.'), 'flashError');
//                return $this->redirect(array('action' => 'viewProfile'));
//            }
        } else {
            //$options = array('conditions' => array('Administrator.' . $this->Administrator->primaryKey => $id));
            $this->set('administrator', $this->getLoggedAdmin());
        }
    }

    public function delete($id = null) {
        $this->Administrator->id = $id;
        if (!$this->Administrator->exists()) {
            throw new NotFoundException(__('Invalid administrator'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Administrator->delete()) {
            $this->Session->setFlash(__('The administrator has been deleted.'));
        } else {
            $this->Session->setFlash(__('The administrator could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
    
    public function approveRegistration() {
        $result = array();
        
        // get the unapproved users from Users Table
        $this->loadModel('User');
        $options = array('conditions' => array('approved' => 0));
        $users = $this->User->find('all', $options);
        
        // Get the users details from appropriate tables
        foreach ($users as $user) {
            if ($user['User']['role'] == "Student") {
                $this->loadModel('Student');
                $student = $this->Student->find('first', array(
                   'conditions' => array(
                       'user_id' => $user['User']['id'],
                   ) 
                ));
                
                $container = array($user, $student);
                array_push($result, $container);
            } elseif ($user['User']['role'] == "Staff") {
                $this->loadModel('Staff');
                $staff = $this->Staff->find('first', array(
                   'conditions' => array(
                       'user_id' => $user['User']['id'],
                   ) 
                ));
                
                $container = array($user, $student);
                array_push($result, $container);
            }            
        }
        
        $this->loadModel('Administrator');
        $this->set('results', $result);
    }
    
    public function approveStudent() {
        $this->set('administrator', $this->getLoggedAdmin());

        $students = array();
        
        // get the unapproved users from Users Table
        $this->loadModel('User');
        $options = array('conditions' => array('approved' => 0));
        $users = $this->User->find('all', $options);
        
        // Get the users details from appropriate tables
        foreach ($users as $user) {
            if ($user['User']['role'] == "Student") {
                $this->loadModel('Student');
                $student = $this->Student->find('first', array(
                   'conditions' => array(
                       'user_id' => $user['User']['id'],
                   ) 
                ));              
                
                array_push($students, $student);
            }
        }
        
        $this->loadModel('Administrator');
        $this->set('students', $students);
    
    }

    public function approveStaff() {
        $this->set('administrator', $this->getLoggedAdmin());

        $staffs = array();
        
        // get the unapproved users from Users Table
        $this->loadModel('User');
        $options = array('conditions' => array('approved' => 0));
        $users = $this->User->find('all', $options);
        
        // Get the users details from appropriate tables
        foreach ($users as $user) {
            if ($user['User']['role'] == "Staff") {
                $this->loadModel('Staff');
                $staff = $this->Staff->find('first', array(
                   'conditions' => array(
                       'user_id' => $user['User']['id'],
                   ) 
                ));              
                
                array_push($staffs, $staff);
            }
        }
        
        $this->loadModel('Administrator');
        $this->set('staffs', $staffs);
        
    }
    
    public function requestApprove($id = NULL) {
        $this->autoRender = false;

        if ($id == null) {
            $this->Session->setFlash(__('Oopz, Something went wrong. No ID was Passed, try again.'), 'flashError');
            return;
        }
        
        $this->loadModel('User');
        
        // get the updating user for redirection after updating is done
        $user = $this->User->find('first', array(
            'conditions' => array(
                'id' => $id,
            )
        ));
        
        // update the User table
                
        if ($this->User->updateAll(array('approved' => 1), array('id' => $id))) {
            $this->loadModel('Student');
            $student = $this->Student->find('first', array(
                'conditions' => array(
                    'user_id' => $user['User']['id'],                    
                )
            ));
            
            // Send the email
            $subject = "MoDACA - Account Approval";
            $emailFields = array();
            $emailFields['title'] = "Congratulations! Your Account has been Approved";
            $emailFields['body'] = "Congratulations " . $student['Student']['first_name'] . ", Your Student User account is Approved. You can now login to MoDACA - Health Promotion Management System.";
            
            $res = SendEmail::sendMail($student['Student']['email'], $subject, $emailFields, 'account_approve');
            
            $this->Session->setFlash(__('The User: <b>'. $student['Student']['first_name'] . " " . $student['Student']['last_name'] . '</b> was <b>Succesfully</b> Approved.'), 'flashSuccess');
            if ($user['User']['role'] == "Student") {
                return $this->redirect(array('action' => 'approveStudent'));
            } else if ($user['User']['role'] == "Staff") {
                return $this->redirect(array('action' => 'approveStaff'));
            }
            
        } else {
            $this->Session->setFlash(__('Oopz, Something went wrong. The User was <b>NOT</b> Approved. Please, try again.'), 'flashError');
            if ($user['User']['role'] == "Student") {
                return $this->redirect(array('action' => 'approveStudent'));
            } else if ($user['User']['role'] == "Staff") {
                return $this->redirect(array('action' => 'approveStaff'));
            }
        }
    }
    
    public function requestDecline($id = NULL) {
        
    }


    public function changePassword() {
        $this->set('administrator', $this->getLoggedAdmin());

    }
    
    public function searchProfile() {
        $this->set('administrator', $this->getLoggedAdmin());
        
    }
    
    public function viewProfile() {
        $this->set('administrator', $this->getLoggedAdmin());
    }
    
    private function getLoggedAdmin() {
        $user = AuthComponent::user();
        if ($user['role'] == 'Admin') {
            $options = array('conditions' => array('Administrator.user_id' => $user['id']));
            return $loggedAdmin = $this->Administrator->find('first', $options);            
        } else {
            return $this->redirect(array( 'controller' => 'users', 'action' => 'redirectLoggedUser'));
        }
    }

    public function uploadPhoto($data) {
        $file = $data;

        if($file['error'] === UPLOAD_ERR_OK) {
            $folderName = APP.'webroot'.DS.'uploads'.DS.'admins';
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
            $this->request->data['Administrator']['profile_photo'] = $id;
            return true;
        }
        return false;
    }
}
