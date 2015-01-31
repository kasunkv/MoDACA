<?php
App::uses('AppController', 'Controller');
App::uses('RestHelper', 'Lib');
/**
 * OilUsages Controller
 *
 * @property OilUsage $OilUsage
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class OilUsagesController extends AppController {

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

            $usages = $this->OilUsage->find('all', array(
                'conditions' => array(
                    'OilUsage.household_id' => $id,
                ),
                'recursive' => -1
            ));

            $result = [];
            foreach($usages as $usage) {
                array_push($result, $usage['OilUsage']);
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
