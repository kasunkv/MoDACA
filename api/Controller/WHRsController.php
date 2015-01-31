<?php
App::uses('AppController', 'Controller');
App::uses('RestHelper', 'Lib');

class WHRsController extends AppController {


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
                
                $results = $this->WHR->find('all', array('recursive' => -1));
                $whrs = array();
                foreach ($results as $res) {
                    array_push($whrs, $res['WHR']);
                }
                
                if (count($whrs) > 0) {
                    $response = RestHelper::createResponseMessage('success', array('data' => json_encode($whrs), 'message' => 'Data retrived from the database.'));
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
            $whr = array();
            if ($id ==  NULL) {
                $response = RestHelper::createResponseMessage('error', array('message' => 'No ID passed.'));
                echo json_encode($response);
                return;
            }

            $results = $this->WHR->find('all', array(
                'conditions' => array(
                    'WHR.family_member_id' => $id,
                ),
                'recursive' => -1,
            ));

            if (count($results) > 0) {

                foreach($results as $result) {
                    array_push($whr, $result['WHR']);
                }

                $response = RestHelper::createResponseMessage('success', array('data' => json_encode($whr), 'message' => 'Data retrived from the database.'));
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
            $temp['WHR']['family_member_id'] = $data['family_member_id'];
            $temp['WHR']['date'] = $data['date'];
            $temp['WHR']['value'] = $data['value'];

            $this->loadModel('WHR');
            $this->WHR->create();
            if($this->WHR->save($temp)) {
                $response = RestHelper::createResponseMessage('success', array('data' => null, 'message' => 'WHR data was saved.'));
                echo json_encode($response);
            } else {
                $response = RestHelper::createResponseMessage('error', array('data' => null, 'message' => 'Failed to save WHR data.'));
                echo json_encode($response);
            }
        }
            
	}

	public function update($id = null) {
	    $this->autoRender = false;
            
	}


	public function delete($id = null) {
		$this->WHR->id = $id;
		if (!$this->WHR->exists()) {
			throw new NotFoundException(__('Invalid w h r'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->WHR->delete()) {
			return $this->flash(__('The w h r has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The w h r could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}
}
