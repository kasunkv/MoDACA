<?php

App::uses('AppController', 'Controller');

/**
 * BMIs Controller
 *
 * @property BMI $BMI
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class BMIsController extends AppController {

    public function index() {
        $this->BMI->recursive = 0;
        $this->set('bMIs', $this->Paginator->paginate());
    }

    public function view($id = null) {
        if (!$this->BMI->exists($id)) {
            throw new NotFoundException(__('Invalid b m i'));
        }
        $options = array('conditions' => array('BMI.' . $this->BMI->primaryKey => $id));
        $this->set('bMI', $this->BMI->find('first', $options));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->BMI->create();
            if ($this->BMI->save($this->request->data)) {
                $this->Session->setFlash(__('The b m i has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The b m i could not be saved. Please, try again.'));
            }
        }
        $familyMembers = $this->BMI->FamilyMember->find('list');
        $this->set(compact('familyMembers'));
    }

    public function edit($id = null) {
        if (!$this->BMI->exists($id)) {
            throw new NotFoundException(__('Invalid b m i'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->BMI->save($this->request->data)) {
                $this->Session->setFlash(__('The b m i has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The b m i could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('BMI.' . $this->BMI->primaryKey => $id));
            $this->request->data = $this->BMI->find('first', $options);
        }
        $familyMembers = $this->BMI->FamilyMember->find('list');
        $this->set(compact('familyMembers'));
    }

    public function delete($id = null) {
        $this->BMI->id = $id;
        if (!$this->BMI->exists()) {
            throw new NotFoundException(__('Invalid b m i'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->BMI->delete()) {
            $this->Session->setFlash(__('The b m i has been deleted.'));
        } else {
            $this->Session->setFlash(__('The b m i could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
