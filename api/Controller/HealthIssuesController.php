<?php
App::uses('AppController', 'Controller');

class HealthIssuesController extends AppController {


	public $components = array('Paginator');


	public function index() {
		$this->HealthIssue->recursive = 0;
		$this->set('healthIssues', $this->Paginator->paginate());
	}


	public function view($id = null) {
		if (!$this->HealthIssue->exists($id)) {
			throw new NotFoundException(__('Invalid health issue'));
		}
		$options = array('conditions' => array('HealthIssue.' . $this->HealthIssue->primaryKey => $id));
		$this->set('healthIssue', $this->HealthIssue->find('first', $options));
	}


	public function add() {
		if ($this->request->is('post')) {
			$this->HealthIssue->create();
			if ($this->HealthIssue->save($this->request->data)) {
				return $this->flash(__('The health issue has been saved.'), array('action' => 'index'));
			}
		}
	}


	public function edit($id = null) {
		if (!$this->HealthIssue->exists($id)) {
			throw new NotFoundException(__('Invalid health issue'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->HealthIssue->save($this->request->data)) {
				return $this->flash(__('The health issue has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('HealthIssue.' . $this->HealthIssue->primaryKey => $id));
			$this->request->data = $this->HealthIssue->find('first', $options);
		}
	}


	public function delete($id = null) {
		$this->HealthIssue->id = $id;
		if (!$this->HealthIssue->exists()) {
			throw new NotFoundException(__('Invalid health issue'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->HealthIssue->delete()) {
			return $this->flash(__('The health issue has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The health issue could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}
}
