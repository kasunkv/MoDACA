<?php
App::uses('AppController', 'Controller');
App::uses('RestHelper', 'Lib');
/**
 * Households Controller
 *
 * @property Household $Household
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class HouseholdsController extends AppController {
    

	public $components = array('Paginator', 'Session');

        public function beforeFilter() {
           // $this->Auth->allow();
        }
        public function getAll() {
            $this->autoRender = false;
            
            if ($this->request->is('post')) {
                $response = array();
                
                $results = $this->Household->find('all');
                $households = array();
                foreach ($results as $res) {
                    array_push($households, $res['Household']);
                }
                
                if (count($households) > 0) {
                    $response = RestHelper::createResponseMessage('success', array('data' => json_encode($households), 'message' => 'Data retrived from the database.'));
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
                $house = "";
                if ($id ==  NULL) {
                    $response = RestHelper::createResponseMessage('error', array('message' => 'No ID passed.'));
                    echo json_encode($response);
                    return;
                }

                $results = $this->Household->find('first', array(
                    'conditions' => array(
                        'Household.id' => $id,
                    )
                ));

                if (count($results) > 0) {
                    $house = $results['Household'];
                    $response = RestHelper::createResponseMessage('success', array('data' => json_encode($house), 'message' => 'Data retrived from the database.'));
                     echo json_encode($response);
                } else {
                    $response = RestHelper::createResponseMessage('error', array('data' => null, 'message' => 'No data in the database'));
                    echo json_encode($response);
                }
            }
        }
        
        
        
        public function save() {
            $this->autoRender = false;
            
            if ($this->request->is('post')) {
                $response = array();               
                
                //$this->set('data', $this->response->data);
                
                echo json_encode($this->request->data);
                
                
                
//                if ($this->Household->save($this->request->data)) {
//                    $response = RestHelper::createResponseMessage('success', array('message' => 'Successfully saved to database'));
//                    
//              //      $this->set('response', $response);
//                    echo json_encode($response);
//                } else {
//                    $response = RestHelper::createResponseMessage('error', array('message' => 'Failed to save to database'));
//                    
//              //      $this->set('response', $response);
//                    echo json_encode($response);
//                }
            }
        }
        

        
	public function delete($id = null) {
		$this->Household->id = $id;
		if (!$this->Household->exists()) {
			throw new NotFoundException(__('Invalid household'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Household->delete()) {
			$this->Session->setFlash(__('The household has been deleted.'));
		} else {
			$this->Session->setFlash(__('The household could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
