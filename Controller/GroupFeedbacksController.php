<?php
App::uses('AppController', 'Controller');
/**
 * GroupFeedbacks Controller
 *
 * @property GroupFeedback $GroupFeedback
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class GroupFeedbacksController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->GroupFeedback->recursive = 0;
		$this->set('groupFeedbacks', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->GroupFeedback->exists($id)) {
			throw new NotFoundException(__('Invalid group feedback'));
		}
		$options = array('conditions' => array('GroupFeedback.' . $this->GroupFeedback->primaryKey => $id));
		$this->set('groupFeedback', $this->GroupFeedback->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->GroupFeedback->create();
			if ($this->GroupFeedback->save($this->request->data)) {
				$this->Session->setFlash(__('The group feedback has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group feedback could not be saved. Please, try again.'));
			}
		}
		$fieldGroups = $this->GroupFeedback->FieldGroup->find('list');
		$staffs = $this->GroupFeedback->Staff->find('list');
		$this->set(compact('fieldGroups', 'staffs'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->GroupFeedback->exists($id)) {
			throw new NotFoundException(__('Invalid group feedback'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->GroupFeedback->save($this->request->data)) {
				$this->Session->setFlash(__('The group feedback has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group feedback could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('GroupFeedback.' . $this->GroupFeedback->primaryKey => $id));
			$this->request->data = $this->GroupFeedback->find('first', $options);
		}
		$fieldGroups = $this->GroupFeedback->FieldGroup->find('list');
		$staffs = $this->GroupFeedback->Staff->find('list');
		$this->set(compact('fieldGroups', 'staffs'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->GroupFeedback->id = $id;
		if (!$this->GroupFeedback->exists()) {
			throw new NotFoundException(__('Invalid group feedback'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->GroupFeedback->delete()) {
			$this->Session->setFlash(__('The group feedback has been deleted.'));
		} else {
			$this->Session->setFlash(__('The group feedback could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
