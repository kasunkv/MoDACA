<?php
App::uses('AppController', 'Controller');
/**
 * WHRs Controller
 *
 * @property WHR $WHR
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property SessionComponent $Session
 */
class WHRsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->WHR->recursive = 0;
		$this->set('wHRs', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->WHR->exists($id)) {
			throw new NotFoundException(__('Invalid w h r'));
		}
		$options = array('conditions' => array('WHR.' . $this->WHR->primaryKey => $id));
		$this->set('wHR', $this->WHR->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->WHR->create();
			if ($this->WHR->save($this->request->data)) {
				$this->Session->setFlash(__('The w h r has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The w h r could not be saved. Please, try again.'));
			}
		}
		$familyMembers = $this->WHR->FamilyMember->find('list');
		$this->set(compact('familyMembers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->WHR->exists($id)) {
			throw new NotFoundException(__('Invalid w h r'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->WHR->save($this->request->data)) {
				$this->Session->setFlash(__('The w h r has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The w h r could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('WHR.' . $this->WHR->primaryKey => $id));
			$this->request->data = $this->WHR->find('first', $options);
		}
		$familyMembers = $this->WHR->FamilyMember->find('list');
		$this->set(compact('familyMembers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->WHR->id = $id;
		if (!$this->WHR->exists()) {
			throw new NotFoundException(__('Invalid w h r'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->WHR->delete()) {
			$this->Session->setFlash(__('The w h r has been deleted.'));
		} else {
			$this->Session->setFlash(__('The w h r could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
