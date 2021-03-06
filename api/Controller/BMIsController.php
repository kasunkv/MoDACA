<?php
App::uses('AppController', 'Controller');
App::uses('RestHelper', 'Lib');

class BMIsController extends AppController {


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
                
                $results = $this->BMI->find('all', array('recursive' => -1,));
                $BMIs = array();
                foreach ($results as $res) {
                    array_push($BMIs, $res['BMI']);
                }
                
                if (count($BMIs) > 0) {
                    $response = RestHelper::createResponseMessage('success', array('data' => json_encode($BMIs), 'message' => 'Data retrived from the database.'));
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
                $bmi = array();
                if ($id ==  NULL) {
                    $response = RestHelper::createResponseMessage('error', array('message' => 'No ID passed.'));
                    echo json_encode($response);
                    return;
                }

                $results = $this->BMI->find('all', array(
                    'conditions' => array(
                        'BMI.family_member_id' => $id,
                    ),
                    'recursive' => -1,
                ));

                if (count($results) > 0) {

                    foreach($results as $result) {
                        array_push($bmi, $result['BMI']);
                    }

                    $response = RestHelper::createResponseMessage('success', array('data' => json_encode($bmi), 'message' => 'Data retrived from the database.'));
                     echo json_encode($response);
                } else {
                    $response = RestHelper::createResponseMessage('error', array('data' => null, 'message' => 'Family member does not exist.'));
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

            $temp = $this->BMI->createDataArray($data);

            $this->loadModel('BMI');
            $this->BMI->create();
            if($this->BMI->save($temp)) {
                $response = RestHelper::createResponseMessage('success', array('data' => null, 'message' => 'BMI data was saved.'));
                echo json_encode($response);
            } else {
                $response = RestHelper::createResponseMessage('error', array('data' => null, 'message' => 'Failed to save BMI data.'));
                echo json_encode($response);
            }
        }
            
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
