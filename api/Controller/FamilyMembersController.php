<?php
App::uses('AppController', 'Controller');
App::uses('RestHelper', 'Lib');

class FamilyMembersController extends AppController {

    public $components = array('Paginator', 'Session', 'Security');

    public function beforeFilter() {
        $this->Security->csrfCheck = false;
        $this->Security->unlockedActions = array('ajax_action');
        $this->Security->validatePost = false;
    }

	public function getAll() {
        $this->response->header(array(
                'Access-Control-Allow-Origin' => '*',
                'Access-Control-Allow-Headers' => 'Content-Type'
            )
        );
            $this->autoRender = false;
            
            if ($this->request->is('post')) {
                $response = array();
                
                $results = $this->FamilyMember->find('all', array('recursive' => -1));
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

	public function getByID($id=NULL) {
        $this->response->header(array(
                'Access-Control-Allow-Origin' => '*',
                'Access-Control-Allow-Headers' => 'Content-Type'
            )
        );
        $this->autoRender = false;

        if ($this->request->is('post')) {
            $response = array();
            $member = "";
            if ($id ==  NULL) {
                $response = RestHelper::createResponseMessage('error', array('message' => 'No ID passed.'));
                echo json_encode($response);
                return;
            }

            $results = $this->FamilyMember->find('first', array(
                'conditions' => array(
                    'FamilyMember.id' => $id,
                ),
                'recursive' => -1
            ));

            if (count($results) > 0) {
                $member = $results['FamilyMember'];
                $response = RestHelper::createResponseMessage('success', array('data' => json_encode($member), 'message' => 'Data retrived from the database.'));
                 echo json_encode($response);
            } else {
                $response = RestHelper::createResponseMessage('error', array('data' => null, 'message' => 'No data in the database'));
                echo json_encode($response);
            }
        }
    }


	public function save() {
        $this->response->header(array(
                'Access-Control-Allow-Origin' => '*',
                'Access-Control-Allow-Headers' => 'Content-Type'
            )
        );
        $this->autoRender = false;
        if($this->request->is('post')) {
            $data = $this->request->data;

            $familyMember = $this->FamilyMember->createDataArray($data);

            $this->loadModel('FamilyMember');
            $this->FamilyMember->create();
            if($this->FamilyMember->save($familyMember)) {
                $response = RestHelper::createResponseMessage('success', array('data' => null, 'message' => 'Family Member data was saved.'));
                echo json_encode($response);
            } else {
                $response = RestHelper::createResponseMessage('error', array('data' => null, 'message' => 'Failed to save Family Member data.'));
                echo json_encode($response);
            }
        }
            
	}

    public function getAllByHousehold($id=null) {
        $this->response->header(array(
                'Access-Control-Allow-Origin' => '*',
                'Access-Control-Allow-Headers' => 'Content-Type'
            )
        );
        $this->autoRender = false;

        if ($this->request->is('post')) {
            $response = array();
            $member = "";
            if ($id ==  NULL) {
                $response = RestHelper::createResponseMessage('error', array('message' => 'No ID passed.'));
                echo json_encode($response);
                return;
            }

            $results = $this->FamilyMember->find('all', array(
                'conditions' => array(
                    'FamilyMember.household_id' => $id,
                ),
                'recursive' => -1
            ));


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
