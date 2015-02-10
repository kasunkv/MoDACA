<?php
App::uses('AppController', 'Controller');
App::uses('RestHelper', 'Lib');
/**
 * FieldCommunities Controller
 *
 * @property FieldCommunity $FieldCommunity
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class FieldCommunitiesController extends AppController {

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

    public function getInitialData($id = null) {
        $this->response->header(array(
                'Access-Control-Allow-Origin' => '*',
                'Access-Control-Allow-Headers' => 'Content-Type'
            )
        );
        $this->autoRender = false;

        if ($this->request->is('post')) {
            $response = array();
            $data = [];
            if ($id ==  null) {
                $response = RestHelper::createResponseMessage('error', array('message' => 'No ID passed.'));
                echo json_encode($response);
                return;
            }

            $results = $this->FieldCommunity->find('first', array(
                'conditions' => array(
                    'FieldCommunity.id' => $id,
                ),
                'recursive' => 1
            ));

            if (count($results) > 0) {
                array_push($data, $results['InitAgeDistribution']);
                array_push($data, $results['InitEducationLevel']);
                array_push($data, $results['InitIncome']);
                array_push($data, $results['InitOccupation']);
                array_push($data, $results['InitPopulation']);

                $response = RestHelper::createResponseMessage('success', array('data' => json_encode($data), 'message' => 'Data retrived from the database.'));
                echo json_encode($response);
            } else {
                $response = RestHelper::createResponseMessage('error', array('data' => null, 'message' => 'No data in the database'));
                echo json_encode($response);
            }
        }

    }



}
