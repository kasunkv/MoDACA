<?php
App::uses('AppController', 'Controller');
/**
 * FamilyMembers Controller
 *
 * @property FamilyMember $FamilyMember
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class FamilyMembersController extends AppController {

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
		$this->FamilyMember->recursive = 0;
		$this->set('familyMembers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FamilyMember->exists($id)) {
			throw new NotFoundException(__('Invalid family member'));
		}
		$options = array('conditions' => array('FamilyMember.' . $this->FamilyMember->primaryKey => $id));
		$this->set('familyMember', $this->FamilyMember->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FamilyMember->create();
			if ($this->FamilyMember->save($this->request->data)) {
				$this->Session->setFlash(__('The family member has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The family member could not be saved. Please, try again.'));
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
		if (!$this->FamilyMember->exists($id)) {
			throw new NotFoundException(__('Invalid family member'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FamilyMember->save($this->request->data)) {
				$this->Session->setFlash(__('The family member has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The family member could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FamilyMember.' . $this->FamilyMember->primaryKey => $id));
			$this->request->data = $this->FamilyMember->find('first', $options);
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
		$this->FamilyMember->id = $id;
		if (!$this->FamilyMember->exists()) {
			throw new NotFoundException(__('Invalid family member'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FamilyMember->delete()) {
			$this->Session->setFlash(__('The family member has been deleted.'));
		} else {
			$this->Session->setFlash(__('The family member could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
