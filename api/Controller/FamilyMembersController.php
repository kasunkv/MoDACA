<?php
App::uses('AppController', 'Controller');

class FamilyMembersController extends AppController {

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
