<?php

App::uses('AppController', 'Controller');

/**
 * Administrators Controller
 *
 * @property Administrator $Administrator
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AdministratorsController extends AppController {

    public function index() {
        $this->Administrator->recursive = 0;
        $this->set('administrators', $this->Paginator->paginate());
    }

    public function view($id = null) {
        if (!$this->Administrator->exists($id)) {
            throw new NotFoundException(__('Invalid administrator'));
        }
        $options = array('conditions' => array('Administrator.' . $this->Administrator->primaryKey => $id));
        $this->set('administrator', $this->Administrator->find('first', $options));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Administrator->create();
            if ($this->Administrator->save($this->request->data)) {
                $this->Session->setFlash(__('The administrator has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The administrator could not be saved. Please, try again.'));
            }
        }
    }

    public function edit($id = null) {
        if (!$this->Administrator->exists($id)) {
            throw new NotFoundException(__('Invalid administrator'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Administrator->save($this->request->data)) {
                $this->Session->setFlash(__('The administrator has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The administrator could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Administrator.' . $this->Administrator->primaryKey => $id));
            $this->request->data = $this->Administrator->find('first', $options);
        }
    }

    public function delete($id = null) {
        $this->Administrator->id = $id;
        if (!$this->Administrator->exists()) {
            throw new NotFoundException(__('Invalid administrator'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Administrator->delete()) {
            $this->Session->setFlash(__('The administrator has been deleted.'));
        } else {
            $this->Session->setFlash(__('The administrator could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
