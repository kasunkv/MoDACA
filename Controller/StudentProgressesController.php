<?php
App::uses('AppController', 'Controller');
/**
 * StudentProgresses Controller
 *
 * @property StudentProgress $StudentProgress
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property SessionComponent $Session
 */
class StudentProgressesController extends AppController {

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
		$this->StudentProgress->recursive = 0;
		$this->set('studentProgresses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->StudentProgress->exists($id)) {
			throw new NotFoundException(__('Invalid student progress'));
		}
		$options = array('conditions' => array('StudentProgress.' . $this->StudentProgress->primaryKey => $id));
		$this->set('studentProgress', $this->StudentProgress->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StudentProgress->create();
			if ($this->StudentProgress->save($this->request->data)) {
				$this->Session->setFlash(__('The student progress has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The student progress could not be saved. Please, try again.'));
			}
		}
		$students = $this->StudentProgress->Student->find('list');
		$this->set(compact('students'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->StudentProgress->exists($id)) {
			throw new NotFoundException(__('Invalid student progress'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->StudentProgress->save($this->request->data)) {
				$this->Session->setFlash(__('The student progress has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The student progress could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('StudentProgress.' . $this->StudentProgress->primaryKey => $id));
			$this->request->data = $this->StudentProgress->find('first', $options);
		}
		$students = $this->StudentProgress->Student->find('list');
		$this->set(compact('students'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->StudentProgress->id = $id;
		if (!$this->StudentProgress->exists()) {
			throw new NotFoundException(__('Invalid student progress'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->StudentProgress->delete()) {
			$this->Session->setFlash(__('The student progress has been deleted.'));
		} else {
			$this->Session->setFlash(__('The student progress could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
