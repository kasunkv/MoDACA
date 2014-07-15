<?php

App::uses('AppController', 'Controller');

/**
 * FamilyMemberKnowledges Controller
 *
 * @property FamilyMemberKnowledge $FamilyMemberKnowledge
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class FamilyMemberKnowledgesController extends AppController {

    public function index() {
        $this->FamilyMemberKnowledge->recursive = 0;
        $this->set('familyMemberKnowledges', $this->Paginator->paginate());
    }

    public function view($id = null) {
        if (!$this->FamilyMemberKnowledge->exists($id)) {
            throw new NotFoundException(__('Invalid family member knowledge'));
        }
        $options = array('conditions' => array('FamilyMemberKnowledge.' . $this->FamilyMemberKnowledge->primaryKey => $id));
        $this->set('familyMemberKnowledge', $this->FamilyMemberKnowledge->find('first', $options));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->FamilyMemberKnowledge->create();
            if ($this->FamilyMemberKnowledge->save($this->request->data)) {
                $this->Session->setFlash(__('The family member knowledge has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The family member knowledge could not be saved. Please, try again.'));
            }
        }
        $familyMembers = $this->FamilyMemberKnowledge->FamilyMember->find('list');
        $questionnaires = $this->FamilyMemberKnowledge->Questionnaire->find('list');
        $this->set(compact('familyMembers', 'questionnaires'));
    }

    public function edit($id = null) {
        if (!$this->FamilyMemberKnowledge->exists($id)) {
            throw new NotFoundException(__('Invalid family member knowledge'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->FamilyMemberKnowledge->save($this->request->data)) {
                $this->Session->setFlash(__('The family member knowledge has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The family member knowledge could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('FamilyMemberKnowledge.' . $this->FamilyMemberKnowledge->primaryKey => $id));
            $this->request->data = $this->FamilyMemberKnowledge->find('first', $options);
        }
        $familyMembers = $this->FamilyMemberKnowledge->FamilyMember->find('list');
        $questionnaires = $this->FamilyMemberKnowledge->Questionnaire->find('list');
        $this->set(compact('familyMembers', 'questionnaires'));
    }

    public function delete($id = null) {
        $this->FamilyMemberKnowledge->id = $id;
        if (!$this->FamilyMemberKnowledge->exists()) {
            throw new NotFoundException(__('Invalid family member knowledge'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->FamilyMemberKnowledge->delete()) {
            $this->Session->setFlash(__('The family member knowledge has been deleted.'));
        } else {
            $this->Session->setFlash(__('The family member knowledge could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
