<?php
App::uses('AppController', 'Controller');

class PregnantMothersController extends AppController {


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
		$this->PregnantMother->id = $id;
		if (!$this->PregnantMother->exists()) {
			throw new NotFoundException(__('Invalid pregnant mother'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PregnantMother->delete()) {
			return $this->flash(__('The pregnant mother has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The pregnant mother could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}
}
