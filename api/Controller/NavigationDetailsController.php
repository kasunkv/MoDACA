<?php
App::uses('AppController', 'Controller');
App::uses('RestHelper', 'Lib');

class NavigationDetailsController extends AppController {


	public $components = array('Paginator');


	public function getAll() {
            $this->autoRender = false;
            
            if ($this->request->is('post')) {
                $response = array();
                
                $results = $this->NavigationDetail->find('all');
                $details = array();
                foreach ($results as $res) {
                    array_push($details, $res['NavigationDetail']);
                }
                
                if (count($details) > 0) {
                    $response = RestHelper::createResponseMessage('success', array('data' => json_encode($details), 'message' => 'Data retrived from the database.'));
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
