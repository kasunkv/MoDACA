<?php

App::uses('AppController', 'Controller');

/**
 * Students Controller
 *
 * @property Student $Student
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class StudentsController extends AppController {
    //public $components = array('Auth');
    
    public function beforeFilter() {
        $this->Auth->allow('register');
    }

    public function index() {
        $this->Student->recursive = 0;
        $this->set('students', $this->Paginator->paginate());
    }

    public function view($id = null) {
        if (!$this->Student->exists($id)) {
            throw new NotFoundException(__('Invalid student'));
        }
        $options = array('conditions' => array('Student.' . $this->Student->primaryKey => $id));
        $this->set('student', $this->Student->find('first', $options));
    }

    public function register() {
        if ($this->request->is('post')) {
            $this->Student->create();
            if ($this->Student->save($this->request->data)) {
                $this->Session->setFlash(__('The student has been saved.'), 'flashSuccess');
                return $this->redirect(array('controller' => 'pages', 'action' => 'home'));
            } else {
                $this->Session->setFlash(__('The student could not be saved. Please, try again.'), 'flashError');
            }
            
        }
        $fieldGroups = $this->Student->FieldGroup->find('list');
        $this->set(compact('fieldGroups'));
    }

    public function editStudent($id = null) {
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
        $this->set('students', $this->Paginator->paginate());
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
            
            
            
            // then redirect with the message
            $message = 'Student with ID ' . $id . ' was successfully approved.';
            $element = 'flashSuccess';
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
            $element = 'flashWarn';
        }
        
        // Redirect to approveStudent View
        $this->Session->setFlash(__($message), $element);
        $this->redirect(array('action' => 'approveStudent'));
    }
    
    
    // Change Password
    
    public function changePassword() {
        
    }

    // View Student Group Members
    
    public function viewGroupMembers($grp_id = null) {
        $message = null;
        $element = null;
        
        if (!$grp_id) {            
            $message = 'Something went wrong, Can not find field group members';
            $element = 'flashError';
            $this->Session->setFlash(__($message), $element);
            //$this->redirect(array('action' => 'index'));
        }
        
        //$options = array('conditions' => array('Student.' . 'field_group_id' => $grp_id));
        $this->set('students', $this->Student->find('all'));
    }
    
    // View Student Group Members Profile
    
    public function viewMemberProfile($id = null) {
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
        $this->set('student', $this->Student->find('first', $options));
    }
    
    // View Field Group Progress
    
    public function viewGroupProgress(){
        
    }
    
    // View My Progress
    
    public function viewMyProgress() {
        
    }
    
    // Generate Reports
    
    public function generateReports() {
        
    }
    
    public function trackStudents() {
        
    }
    
    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect('index');
            }
            
           
        }
    }
    
    
    
    
    
    
    
    
}
