<?php
App::uses('AppController', 'Controller');

class NavigationDetailsController extends AppController {


	public $components = array('Paginator');


	public function index() {
		$this->NavigationDetail->recursive = 0;
		$this->set('navigationDetails', $this->Paginator->paginate());
	}


	public function view($id = null) {
		if (!$this->NavigationDetail->exists($id)) {
			throw new NotFoundException(__('Invalid navigation detail'));
		}
		$options = array('conditions' => array('NavigationDetail.' . $this->NavigationDetail->primaryKey => $id));
		$this->set('navigationDetail', $this->NavigationDetail->find('first', $options));
	}


	public function add() {
		if ($this->request->is('post')) {
			$this->NavigationDetail->create();
			if ($this->NavigationDetail->save($this->request->data)) {
				return $this->flash(__('The navigation detail has been saved.'), array('action' => 'index'));
			}
		}
		$households = $this->NavigationDetail->Household->find('list');
		$this->set(compact('households'));
	}


	public function edit($id = null) {
		if (!$this->NavigationDetail->exists($id)) {
			throw new NotFoundException(__('Invalid navigation detail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->NavigationDetail->save($this->request->data)) {
				return $this->flash(__('The navigation detail has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('NavigationDetail.' . $this->NavigationDetail->primaryKey => $id));
			$this->request->data = $this->NavigationDetail->find('first', $options);
		}
		$households = $this->NavigationDetail->Household->find('list');
		$this->set(compact('households'));
	}


	public function delete($id = null) {
		$this->NavigationDetail->id = $id;
		if (!$this->NavigationDetail->exists()) {
			throw new NotFoundException(__('Invalid navigation detail'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->NavigationDetail->delete()) {
			return $this->flash(__('The navigation detail has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The navigation detail could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}
}
