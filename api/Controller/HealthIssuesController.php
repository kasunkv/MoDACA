<?php
App::uses('AppController', 'Controller');

class HealthIssuesController extends AppController {


	public $components = array('Paginator');


	public function getAll() {
            $this->autoRender = false;
            
	}

	public function getByID($id = null) {
	    $this->autoRender = false;
            
	}


	public function save() {
            $this->autoRender = false;
            
	}

	public function update($id = null) {
	    $this->autoRender = false;
            
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
