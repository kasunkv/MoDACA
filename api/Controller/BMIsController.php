<?php
App::uses('AppController', 'Controller');

class BMIsController extends AppController {


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
