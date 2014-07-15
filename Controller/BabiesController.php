<?php

App::uses('AppController', 'Controller');

/**
 * Babies Controller
 *
 * @property Baby $Baby
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class BabiesController extends AppController {

    public function index() {
        $this->Baby->recursive = 0;
        $this->set('babies', $this->Paginator->paginate());
    }

    public function view($id = null) {
        if (!$this->Baby->exists($id)) {
            throw new NotFoundException(__('Invalid baby'));
        }
        $options = array('conditions' => array('Baby.' . $this->Baby->primaryKey => $id));
        $this->set('baby', $this->Baby->find('first', $options));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Baby->create();
            if ($this->Baby->save($this->request->data)) {
                $this->Session->setFlash(__('The baby has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The baby could not be saved. Please, try again.'));
            }
        }
        $households = $this->Baby->Household->find('list');
        $healthIssues = $this->Baby->HealthIssue->find('list');
        $this->set(compact('households', 'healthIssues'));
    }

    public function edit($id = null) {
        if (!$this->Baby->exists($id)) {
            throw new NotFoundException(__('Invalid baby'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Baby->save($this->request->data)) {
                $this->Session->setFlash(__('The baby has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The baby could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Baby.' . $this->Baby->primaryKey => $id));
            $this->request->data = $this->Baby->find('first', $options);
        }
        $households = $this->Baby->Household->find('list');
        $healthIssues = $this->Baby->HealthIssue->find('list');
        $this->set(compact('households', 'healthIssues'));
    }

    public function delete($id = null) {
        $this->Baby->id = $id;
        if (!$this->Baby->exists()) {
            throw new NotFoundException(__('Invalid baby'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Baby->delete()) {
            $this->Session->setFlash(__('The baby has been deleted.'));
        } else {
            $this->Session->setFlash(__('The baby could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
