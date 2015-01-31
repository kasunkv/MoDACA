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
                
                $results = $this->Household->find('all');
                $households = array();
                foreach ($results as $res) {
                    array_push($households, $res['Household']);
                }
                
                if (count($households) > 0) {
                    $response = RestHelper::createResponseMessage('success', array('data' => json_encode($households), 'message' => 'Data retrived from the database.'));
                     //echo json_encode($response);
                } else {
                    $response = RestHelper::createResponseMessage('error', array('data' => null, 'message' => 'No data in the database'));
                    //echo json_encode($response);
                }
                
                $this->response->type('json');
                $this->response->body(json_encode($response));
               
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
                $house = "";
                if ($id ==  NULL) {
                    $response = RestHelper::createResponseMessage('error', array('message' => 'No ID passed.'));
                    echo json_encode($response);
                    return;
                }

                $results = $this->Household->find('first', array(
                    'conditions' => array(
                        'Household.id' => $id,
                    ),
                    'recursive' => -1
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
            $this->response->header(array(
                    'Access-Control-Allow-Origin' => '*',
                    'Access-Control-Allow-Headers' => 'Content-Type'
                )
            );
            $this->autoRender = false;
            if($this->request->is('post')) {
                $data = $this->request->data;

                $temp = $this->Household->createDataArray($data);

                $this->loadModel('Household');
                $this->Household->create();
                if($this->Household->save($temp)) {
                    $response = RestHelper::createResponseMessage('success', array('data' => null, 'message' => 'Household data was saved.'));
                    echo json_encode($response);
                } else {
                    $response = RestHelper::createResponseMessage('error', array('data' => null, 'message' => 'Failed to save Household data.'));
                    echo json_encode($response);
                }
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
