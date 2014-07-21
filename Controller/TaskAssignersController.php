<?php
App::uses('AppController', 'Controller');
/**
 * TaskAssigners Controller
 *
 * @property TaskAssigner $TaskAssigner
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property SessionComponent $Session
 */
class TaskAssignersController extends AppController {

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
		$this->TaskAssigner->recursive = 0;
		$this->set('taskAssigners', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TaskAssigner->exists($id)) {
			throw new NotFoundException(__('Invalid task assigner'));
		}
		$options = array('conditions' => array('TaskAssigner.' . $this->TaskAssigner->primaryKey => $id));
		$this->set('taskAssigner', $this->TaskAssigner->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TaskAssigner->create();
			if ($this->TaskAssigner->save($this->request->data)) {
				$this->Session->setFlash(__('The task assigner has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The task assigner could not be saved. Please, try again.'));
			}
		}
		$students = $this->TaskAssigner->Student->find('list');
		$fieldGroups = $this->TaskAssigner->FieldGroup->find('list');
		$this->set(compact('students', 'fieldGroups'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TaskAssigner->exists($id)) {
			throw new NotFoundException(__('Invalid task assigner'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TaskAssigner->save($this->request->data)) {
				$this->Session->setFlash(__('The task assigner has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The task assigner could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TaskAssigner.' . $this->TaskAssigner->primaryKey => $id));
			$this->request->data = $this->TaskAssigner->find('first', $options);
		}
		$students = $this->TaskAssigner->Student->find('list');
		$fieldGroups = $this->TaskAssigner->FieldGroup->find('list');
		$this->set(compact('students', 'fieldGroups'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->TaskAssigner->id = $id;
		if (!$this->TaskAssigner->exists()) {
			throw new NotFoundException(__('Invalid task assigner'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TaskAssigner->delete()) {
			$this->Session->setFlash(__('The task assigner has been deleted.'));
		} else {
			$this->Session->setFlash(__('The task assigner could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
