<?php
App::uses('AppController', 'Controller');
App::uses('RestHelper', 'Lib');

class BMIsController extends AppController {


	public $components = array('Paginator');


	public function getAll() {
            $this->autoRender = false;
            
            if ($this->request->is('post')) {
                $response = array();
                
                $results = $this->BMI->find('all');
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
            $this->autoRender = false;
            
            if ($this->request->is('post')) {
                $response = array();
                $bmi = "";
                if ($id ==  NULL) {
                    $response = RestHelper::createResponseMessage('error', array('message' => 'No ID passed.'));
                    echo json_encode($response);
                    return;
                }

                $results = $this->BMI->find('first', array(
                    'conditions' => array(
                        'BMI.id' => $id,
                    )
                ));

                if (count($results) > 0) {
                    $bmi = $results['BMI'];
                    $response = RestHelper::createResponseMessage('success', array('data' => json_encode($bmi), 'message' => 'Data retrived from the database.'));
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
