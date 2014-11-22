<?php
App::uses('AppController', 'Controller');
App::uses('RestHelper', 'Lib');

class HealthIssuesController extends AppController {


	public $components = array('Paginator');


	public function getAll() {
            $this->autoRender = false;
            
            if ($this->request->is('post')) {
                $response = array();
                
                $results = $this->HealthIssue->find('all');
                $issues = array();
                foreach ($results as $res) {
                    array_push($issues, $res['HealthIssue']);
                }
                
                if (count($issues) > 0) {
                    $response = RestHelper::createResponseMessage('success', array('data' => json_encode($issues), 'message' => 'Data retrived from the database.'));
                     echo json_encode($response);
                } else {
                    $response = RestHelper::createResponseMessage('error', array('data' => null, 'message' => 'No data in the database'));
                    echo json_encode($response);
                }
               
            }
	}

	public function getByID($id=NULL) {
            $this->autoRender = false;
            
            if ($this->request->is('post')) {
                $response = array();
                $issue = "";
                if ($id ==  NULL) {
                    $response = RestHelper::createResponseMessage('error', array('message' => 'No ID passed.'));
                    echo json_encode($response);
                    return;
                }

                $results = $this->HealthIssue->find('first', array(
                    'conditions' => array(
                        'HealthIssue.id' => $id,
                    )
                ));

                if (count($results) > 0) {
                    $issue = $results['HealthIssue'];
                    $response = RestHelper::createResponseMessage('success', array('data' => json_encode($issue), 'message' => 'Data retrived from the database.'));
                     echo json_encode($response);
                } else {
                    $response = RestHelper::createResponseMessage('error', array('data' => null, 'message' => 'No data in the database'));
                    echo json_encode($response);
                }
            }
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
