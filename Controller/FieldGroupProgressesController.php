<?php
App::uses('AppController', 'Controller');
/**
 * FieldGroupProgresses Controller
 *
 * @property FieldGroupProgress $FieldGroupProgress
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class FieldGroupProgressesController extends AppController {

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
		$this->FieldGroupProgress->recursive = 0;
		$this->set('fieldGroupProgresses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FieldGroupProgress->exists($id)) {
			throw new NotFoundException(__('Invalid field group progress'));
		}
		$options = array('conditions' => array('FieldGroupProgress.' . $this->FieldGroupProgress->primaryKey => $id));
		$this->set('fieldGroupProgress', $this->FieldGroupProgress->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FieldGroupProgress->create();
			if ($this->FieldGroupProgress->save($this->request->data)) {
				$this->Session->setFlash(__('The field group progress has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The field group progress could not be saved. Please, try again.'));
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
		if (!$this->FieldGroupProgress->exists($id)) {
			throw new NotFoundException(__('Invalid field group progress'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FieldGroupProgress->save($this->request->data)) {
				$this->Session->setFlash(__('The field group progress has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The field group progress could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FieldGroupProgress.' . $this->FieldGroupProgress->primaryKey => $id));
			$this->request->data = $this->FieldGroupProgress->find('first', $options);
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
		$this->FieldGroupProgress->id = $id;
		if (!$this->FieldGroupProgress->exists()) {
			throw new NotFoundException(__('Invalid field group progress'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FieldGroupProgress->delete()) {
			$this->Session->setFlash(__('The field group progress has been deleted.'));
		} else {
			$this->Session->setFlash(__('The field group progress could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
