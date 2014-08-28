<?php
App::uses('AppController', 'Controller');
/**
 * Staffs Controller
 *
 * @property Staff $Staff
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class StaffsController extends AppController {
    public $components = array('Paginator', 'Session', 'Auth');
    
     public function beforeFilter() {
        $this->Auth->allow();
    }

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Staff->recursive = 0;
		$this->set('staffs', $this->Paginator->paginate());
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
	public function add() {
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
	public function edit($id = null) {
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
	public function delete($id = null) {
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
        
        public function register() {            
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
 
        public function createProfile(){
            
        }
        
        public function editProfile(){
            
        }
        
        public function changePassword(){
            
        }
}
