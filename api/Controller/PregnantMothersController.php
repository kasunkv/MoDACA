<?php
App::uses('AppController', 'Controller');
App::uses('RestHelper', 'Lib');

class PregnantMothersController extends AppController {


	public $components = array('Paginator');


	public function getAll() {
            $this->autoRender = false;
            
            if ($this->request->is('post')) {
                $response = array();
                
                $results = $this->PregnantMother->find('all');
                $mothers = array();
                foreach ($results as $res) {
                    array_push($mothers, $res['PregnantMother']);
                }
                
                if (count($mothers) > 0) {
                    $response = RestHelper::createResponseMessage('success', array('data' => json_encode($mothers), 'message' => 'Data retrived from the database.'));
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
                $mother = "";
                if ($id ==  NULL) {
                    $response = RestHelper::createResponseMessage('error', array('message' => 'No ID passed.'));
                    echo json_encode($response);
                    return;
                }

                $results = $this->PregnantMother->find('first', array(
                    'conditions' => array(
                        'PregnantMother.id' => $id,
                    )
                ));

                if (count($results) > 0) {
                    $mother = $results['PregnantMother'];
                    $response = RestHelper::createResponseMessage('success', array('data' => json_encode($mother), 'message' => 'Data retrived from the database.'));
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
