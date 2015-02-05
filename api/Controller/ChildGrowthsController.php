<?php
App::uses('AppController', 'Controller');
App::uses('RestHelper', 'Lib');
/**
 * ChildGrowths Controller
 *
 * @property ChildGrowth $ChildGrowth
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ChildGrowthsController extends AppController {

/**
 * Components
 *
 * @var array
 */
    public $components = array('Paginator', 'Session', 'Security');

    public function beforeFilter() {
        $this->Security->csrfCheck = false;
        $this->Security->unlockedActions = array('ajax_action');
        $this->Security->validatePost = false;
    }


    public function getByChildID($id=NULL) {
        $this->response->header(array(
                'Access-Control-Allow-Origin' => '*',
                'Access-Control-Allow-Headers' => 'Content-Type'
            )
        );
        $this->autoRender = false;

        if ($this->request->is('post')) {
            $response = array();
            $children = array();
            if ($id ==  NULL) {
                $response = RestHelper::createResponseMessage('error', array('message' => 'No ID passed.'));
                echo json_encode($response);
                return;
            }

            $results = $this->ChildGrowth->find('all', array(
                'conditions' => array(
                    'ChildGrowth.baby_id' => $id,
                ),
                'recursive' => -1,
            ));

            if (count($results) > 0) {

                foreach($results as $result) {
                    array_push($children, $result['ChildGrowth']);
                }

                $response = RestHelper::createResponseMessage('success', array('data' => json_encode($children), 'message' => 'Data retrived from the database.'));
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

            $temp = $this->ChildGrowth->createDataArray($data);

            $this->loadModel('ChildGrowth');
            $this->ChildGrowth->create();
            if($this->ChildGrowth->save($temp)) {
                $response = RestHelper::createResponseMessage('success', array('data' => null, 'message' => 'Child Growth data was saved.'));
                echo json_encode($response);
            } else {
                $response = RestHelper::createResponseMessage('error', array('data' => null, 'message' => 'Failed to save Child Growth data.'));
                echo json_encode($response);
            }
        }

    }


}
