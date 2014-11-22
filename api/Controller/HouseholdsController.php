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

	public function index() {
		$this->Household->recursive = 0;
		$this->set('households', $this->Paginator->paginate());
	}


	public function view($id = null) {
		if (!$this->Household->exists($id)) {
			throw new NotFoundException(__('Invalid household'));
		}
		$options = array('conditions' => array('Household.' . $this->Household->primaryKey => $id));
		$this->set('household', $this->Household->find('first', $options));
	}
        
        
        public function getHouseholds() {
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
        
        public function getHousehold($id=NULL) {
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
                        'id' => $id,
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
        
        
        
        public function setHouseholds() {
            if ($this->request->is('post')) {
                $response = array();               
                
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
        

	public function add() {
		if ($this->request->is('post')) {
			$this->Household->create();
			if ($this->Household->save($this->request->data)) {
				$this->Session->setFlash(__('The household has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The household could not be saved. Please, try again.'));
			}
		}
		$fieldCommunities = $this->Household->FieldCommunity->find('list');
		$this->set(compact('fieldCommunities'));
	}

	public function edit($id = null) {
		if (!$this->Household->exists($id)) {
			throw new NotFoundException(__('Invalid household'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Household->save($this->request->data)) {
				$this->Session->setFlash(__('The household has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The household could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Household.' . $this->Household->primaryKey => $id));
			$this->request->data = $this->Household->find('first', $options);
		}
		$fieldCommunities = $this->Household->FieldCommunity->find('list');
		$this->set(compact('fieldCommunities'));
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
