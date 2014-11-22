<?php
App::uses('AppController', 'Controller');

class BMIsController extends AppController {


	public $components = array('Paginator');


	public function index() {
		$this->BMI->recursive = 0;
		$this->set('bMIs', $this->Paginator->paginate());
	}

	public function view($id = null) {
		if (!$this->BMI->exists($id)) {
			throw new NotFoundException(__('Invalid b m i'));
		}
		$options = array('conditions' => array('BMI.' . $this->BMI->primaryKey => $id));
		$this->set('bMI', $this->BMI->find('first', $options));
	}


	public function add() {
		if ($this->request->is('post')) {
			$this->BMI->create();
			if ($this->BMI->save($this->request->data)) {
				return $this->flash(__('The b m i has been saved.'), array('action' => 'index'));
			}
		}
		$familyMembers = $this->BMI->FamilyMember->find('list');
		$this->set(compact('familyMembers'));
	}

	public function edit($id = null) {
		if (!$this->BMI->exists($id)) {
			throw new NotFoundException(__('Invalid b m i'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->BMI->save($this->request->data)) {
				return $this->flash(__('The b m i has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('BMI.' . $this->BMI->primaryKey => $id));
			$this->request->data = $this->BMI->find('first', $options);
		}
		$familyMembers = $this->BMI->FamilyMember->find('list');
		$this->set(compact('familyMembers'));
	}


	public function delete($id = null) {
		$this->BMI->id = $id;
		if (!$this->BMI->exists()) {
			throw new NotFoundException(__('Invalid b m i'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->BMI->delete()) {
			return $this->flash(__('The b m i has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The b m i could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}
}
