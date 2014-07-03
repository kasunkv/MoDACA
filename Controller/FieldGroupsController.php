<?php
App::uses('AppController', 'Controller');
/**
 * FieldGroups Controller
 *
 * @property FieldGroup $FieldGroup
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class FieldGroupsController extends AppController {

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
		$this->FieldGroup->recursive = 0;
		$this->set('fieldGroups', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FieldGroup->exists($id)) {
			throw new NotFoundException(__('Invalid field group'));
		}
		$options = array('conditions' => array('FieldGroup.' . $this->FieldGroup->primaryKey => $id));
		$this->set('fieldGroup', $this->FieldGroup->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FieldGroup->create();
			if ($this->FieldGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The field group has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The field group could not be saved. Please, try again.'));
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
		if (!$this->FieldGroup->exists($id)) {
			throw new NotFoundException(__('Invalid field group'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FieldGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The field group has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The field group could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FieldGroup.' . $this->FieldGroup->primaryKey => $id));
			$this->request->data = $this->FieldGroup->find('first', $options);
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
		$this->FieldGroup->id = $id;
		if (!$this->FieldGroup->exists()) {
			throw new NotFoundException(__('Invalid field group'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FieldGroup->delete()) {
			$this->Session->setFlash(__('The field group has been deleted.'));
		} else {
			$this->Session->setFlash(__('The field group could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
