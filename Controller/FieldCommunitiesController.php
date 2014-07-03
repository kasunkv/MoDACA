<?php
App::uses('AppController', 'Controller');
/**
 * FieldCommunities Controller
 *
 * @property FieldCommunity $FieldCommunity
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class FieldCommunitiesController extends AppController {

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
		$this->FieldCommunity->recursive = 0;
		$this->set('fieldCommunities', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FieldCommunity->exists($id)) {
			throw new NotFoundException(__('Invalid field community'));
		}
		$options = array('conditions' => array('FieldCommunity.' . $this->FieldCommunity->primaryKey => $id));
		$this->set('fieldCommunity', $this->FieldCommunity->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FieldCommunity->create();
			if ($this->FieldCommunity->save($this->request->data)) {
				$this->Session->setFlash(__('The field community has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The field community could not be saved. Please, try again.'));
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
		if (!$this->FieldCommunity->exists($id)) {
			throw new NotFoundException(__('Invalid field community'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FieldCommunity->save($this->request->data)) {
				$this->Session->setFlash(__('The field community has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The field community could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FieldCommunity.' . $this->FieldCommunity->primaryKey => $id));
			$this->request->data = $this->FieldCommunity->find('first', $options);
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
		$this->FieldCommunity->id = $id;
		if (!$this->FieldCommunity->exists()) {
			throw new NotFoundException(__('Invalid field community'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FieldCommunity->delete()) {
			$this->Session->setFlash(__('The field community has been deleted.'));
		} else {
			$this->Session->setFlash(__('The field community could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
