<?php
App::uses('AppController', 'Controller');
/**
 * ProgramEvalCheckpoints Controller
 *
 * @property ProgramEvalCheckpoint $ProgramEvalCheckpoint
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ProgramEvalCheckpointsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
    public $helpers = array('Js');

    public function beforeFilter() {

        $this->Auth->allow();
    }

    public function getByIssueId() {
        if($this->request->is(array('post', 'put'))) {
            if(!empty($this->request->data['health_issue_id'])) {
                $checkPoints = $this->ProgramEvalCheckpoint->find('all', array(
                    'conditions' => array(
                        'ProgramEvalCheckpoint.health_issue_id' => $this->request->data['health_issue_id']
                    ),
                    'fields' => array('id', 'checkpoint', 'date', 'health_issue_id'),
                    'recursive' => -1
                ));

                $this->set(compact('checkPoints'));
            }
        }

        $this->layout = 'ajax';
    }

}
