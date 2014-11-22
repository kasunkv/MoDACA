<?php
App::uses('AppController', 'Controller');

class WHRsController extends AppController {


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
