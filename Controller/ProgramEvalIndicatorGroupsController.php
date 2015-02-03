<?php
App::uses('AppController', 'Controller');
/**
 * ProgramEvalIndicatorGroups Controller
 *
 * @property ProgramEvalIndicatorGroup $ProgramEvalIndicatorGroup
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ProgramEvalIndicatorGroupsController extends AppController {

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

    public function getGroupsByHealthIssueId() {
        if($this->request->is(array('post', 'put'))) {
            if(!empty($this->request->data['ProgramEvalIndicator']['health_issue_id'])) {
                $this->loadModel('ProgramEvalIndicatorGroup');
                $groups = $this->ProgramEvalIndicatorGroup->find('all', array(
                    'conditions' => array(
                        'ProgramEvalIndicatorGroup.health_issue_id' => $this->request->data['ProgramEvalIndicator']['health_issue_id']
                    ),
                    'fields' => array('id', 'category'),
                    'recursive' => -1
                ));

                $this->set(compact('groups'));
            }
        }

        $this->layout = 'ajax';
    }

    public function getIndicatorGroups() {
        if($this->request->is(array('post', 'put'))) {
            if(!empty($this->request->data['health_issue_id']) && !empty($this->request->data['field_group_id']) && !empty($this->request->data['checkpoint_id'])) {
                $indicatorGroups = $this->ProgramEvalIndicatorGroup->find('all', array(
                    'conditions' => array(
                        'ProgramEvalIndicatorGroup.health_issue_id' => $this->request->data['health_issue_id'],
                        'ProgramEvalIndicatorGroup.field_group_id' => $this->request->data['field_group_id'],
                    ),
                    'fields' => array('id', 'category', 'health_issue_id'),
                    'recursive' => -1
                ));

                $checkpointId = $this->request->data['checkpoint_id'];

                $this->set(compact('indicatorGroups', 'checkpointId'));
            }
        }

        $this->layout = 'ajax';
    }



}
