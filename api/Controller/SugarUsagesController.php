<?php
App::uses('AppController', 'Controller');
App::uses('RestHelper', 'Lib');
/**
 * SugarUsages Controller
 *
 * @property SugarUsage $SugarUsage
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SugarUsagesController extends AppController {

/**
 * Components
 *
 * @var array
 */
    public $components = array('Paginator', 'Security');

    public function beforeFilter() {
        $this->Security->csrfCheck = false;
    }

    public function getUsage($id = null) {
        $this->response->header(array(
                'Access-Control-Allow-Origin' => '*',
                'Access-Control-Allow-Headers' => 'Content-Type'
            )
        );

        $this->autoRender = false;

        if($this->request->is('post')) {

            $usages = $this->SugarUsage->find('all', array(
                'conditions' => array(
                    'SugarUsage.household_id' => $id,
                ),
                'recursive' => -1
            ));

            $result = [];
            foreach($usages as $usage) {
                array_push($result, $usage['SugarUsage']);
            }

            if(count($result) > 0) {
                $response = RestHelper::createResponseMessage('success', array('data' => json_encode($result), 'message' => 'Data retrived from the database.'));
                echo json_encode($response);
            } else {
                $response = RestHelper::createResponseMessage('error', array('data' => null, 'message' => 'No data in the database'));
                echo json_encode($response);
            }
        }

    }

}
