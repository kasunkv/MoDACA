<?php

App::uses('AppController', 'Controller');

/**
 * Administrators Controller
 *
 * @property Administrator $Administrator
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AdministratorsController extends AppController {
    public $components = array('Auth');
    
    public function beforeFilter() {
        $this->Auth->allow();
    }

    public function index() {
//        $this->Administrator->recursive = 0;
//        $this->set('administrators', $this->Paginator->paginate());
        $currentAdmin = $this->getLoggedAdmin();
        $this->set('administrator', $currentAdmin);
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
            if ($this->Administrator->save($this->request->data)) {
                $this->Session->setFlash(__('The profile was <b>puccesfully</b> ppdated.'), 'flashSuccess');
                return $this->redirect(array('action' => 'viewProfile'));
            } else {
                $this->Session->setFlash(__('Oopz, Something went wrong. The profile was <b>NOT</b> updated. Please, try again.'), 'flashError');
                return $this->redirect(array('action' => 'viewProfile'));
            }
        } else {
            //$options = array('conditions' => array('Administrator.' . $this->Administrator->primaryKey => $id));
            $this->set('loggedAdmin', $this->getLoggedAdmin());
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
        $this->set('$students', $students);
    
    }

    public function approveStaff() {
        
    }
    
    public function changePassword() {
        
    }
    
    public function searchProfile() {
        
    }
    
    public function viewProfile() {
        $currentAdmin = $this->getLoggedAdmin();
        $this->set('administrator', $currentAdmin);
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
}
