<?php
App::uses('AppController', 'Controller');

class WHRsController extends AppController {


	public $components = array('Paginator');


	public function index() {
		$this->WHR->recursive = 0;
		$this->set('wHRs', $this->Paginator->paginate());
	}


	public function view($id = null) {
		if (!$this->WHR->exists($id)) {
			throw new NotFoundException(__('Invalid w h r'));
		}
		$options = array('conditions' => array('WHR.' . $this->WHR->primaryKey => $id));
		$this->set('wHR', $this->WHR->find('first', $options));
	}


	public function add() {
		if ($this->request->is('post')) {
			$this->WHR->create();
			if ($this->WHR->save($this->request->data)) {
				return $this->flash(__('The w h r has been saved.'), array('action' => 'index'));
			}
		}
		$familyMembers = $this->WHR->FamilyMember->find('list');
		$this->set(compact('familyMembers'));
	}


	public function edit($id = null) {
		if (!$this->WHR->exists($id)) {
			throw new NotFoundException(__('Invalid w h r'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->WHR->save($this->request->data)) {
				return $this->flash(__('The w h r has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('WHR.' . $this->WHR->primaryKey => $id));
			$this->request->data = $this->WHR->find('first', $options);
		}
		$familyMembers = $this->WHR->FamilyMember->find('list');
		$this->set(compact('familyMembers'));
	}


	public function delete($id = null) {
		$this->WHR->id = $id;
		if (!$this->WHR->exists()) {
			throw new NotFoundException(__('Invalid w h r'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->WHR->delete()) {
			return $this->flash(__('The w h r has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The w h r could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}
}
