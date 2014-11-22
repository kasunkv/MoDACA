<?php
App::uses('AppController', 'Controller');
App::uses('RestHelper', 'Lib');

class FamilyMembersController extends AppController {

    public $components = array('Paginator');

	public function getAll() {
            $this->autoRender = false;
            
            if ($this->request->is('post')) {
                $response = array();
                
                $results = $this->FamilyMember->find('all');
                $member = array();
                foreach ($results as $res) {
                    array_push($member, $res['FamilyMember']);
                }
                
                if (count($member) > 0) {
                    $response = RestHelper::createResponseMessage('success', array('data' => json_encode($member), 'message' => 'Data retrived from the database.'));
                     echo json_encode($response);
                } else {
                    $response = RestHelper::createResponseMessage('error', array('data' => null, 'message' => 'No data in the database'));
                    echo json_encode($response);
                }
               
            }
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
