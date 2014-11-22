<?php
App::uses('AppController', 'Controller');

class FamilyMembersController extends AppController {

    public $components = array('Paginator');

	public function index() {
		$this->FamilyMember->recursive = 0;
		$this->set('familyMembers', $this->Paginator->paginate());
	}

	public function view($id = null) {
		if (!$this->FamilyMember->exists($id)) {
			throw new NotFoundException(__('Invalid family member'));
		}
		$options = array('conditions' => array('FamilyMember.' . $this->FamilyMember->primaryKey => $id));
		$this->set('familyMember', $this->FamilyMember->find('first', $options));
	}


	public function add() {
		if ($this->request->is('post')) {
			$this->FamilyMember->create();
			if ($this->FamilyMember->save($this->request->data)) {
				return $this->flash(__('The family member has been saved.'), array('action' => 'index'));
			}
		}
		$households = $this->FamilyMember->Household->find('list');
		$healthIssues = $this->FamilyMember->HealthIssue->find('list');
		$this->set(compact('households', 'healthIssues'));
	}


	public function edit($id = null) {
		if (!$this->FamilyMember->exists($id)) {
			throw new NotFoundException(__('Invalid family member'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FamilyMember->save($this->request->data)) {
				return $this->flash(__('The family member has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('FamilyMember.' . $this->FamilyMember->primaryKey => $id));
			$this->request->data = $this->FamilyMember->find('first', $options);
		}
		$households = $this->FamilyMember->Household->find('list');
		$healthIssues = $this->FamilyMember->HealthIssue->find('list');
		$this->set(compact('households', 'healthIssues'));
	}


	public function delete($id = null) {
		$this->FamilyMember->id = $id;
		if (!$this->FamilyMember->exists()) {
			throw new NotFoundException(__('Invalid family member'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FamilyMember->delete()) {
			return $this->flash(__('The family member has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The family member could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}
}
