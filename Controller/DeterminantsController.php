<?php

App::uses('AppController', 'Controller');

/**
 * Determinants Controller
 *
 * @property Determinant $Determinant
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DeterminantsController extends AppController {

    public function beforeFilter() {
        //$this->Auth->allow('register');
    }

    public function getByHealthIssue() {

        $health_issue_id = $this->request->data['ProgramEvalCheckpoint']['health_issue_id'];

        $determinants = $this->Determinant->find('all', array(
            'conditions' => array(
                'Determinant.health_issue_id' => $health_issue_id,
            ),
            'fields' => array('id', 'title'),
            'recursive' => -1
        ));

        $this->set(compact('determinants'));
        $this->layout = 'ajax';

    }

}
