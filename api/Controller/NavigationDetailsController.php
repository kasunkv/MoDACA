<?php
App::uses('AppController', 'Controller');

class NavigationDetailsController extends AppController {


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
