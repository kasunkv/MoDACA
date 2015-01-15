<?php
App::uses('AppController', 'Controller');
/**
 * QuestionnaireFeedbacks Controller
 *
 * @property QuestionnaireFeedback $QuestionnaireFeedback
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class QuestionnaireFeedbacksController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->QuestionnaireFeedback->recursive = 0;
		$this->set('questionnaireFeedbacks', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->QuestionnaireFeedback->exists($id)) {
			throw new NotFoundException(__('Invalid questionnaire feedback'));
		}
		$options = array('conditions' => array('QuestionnaireFeedback.' . $this->QuestionnaireFeedback->primaryKey => $id));
		$this->set('questionnaireFeedback', $this->QuestionnaireFeedback->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->QuestionnaireFeedback->create();
			if ($this->QuestionnaireFeedback->save($this->request->data)) {
				$this->Session->setFlash(__('The questionnaire feedback has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The questionnaire feedback could not be saved. Please, try again.'));
			}
		}
		$questionnaires = $this->QuestionnaireFeedback->Questionnaire->find('list');
		$fieldGroups = $this->QuestionnaireFeedback->FieldGroup->find('list');
		$staffs = $this->QuestionnaireFeedback->Staff->find('list');
		$this->set(compact('questionnaires', 'fieldGroups', 'staffs'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->QuestionnaireFeedback->exists($id)) {
			throw new NotFoundException(__('Invalid questionnaire feedback'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->QuestionnaireFeedback->save($this->request->data)) {
				$this->Session->setFlash(__('The questionnaire feedback has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The questionnaire feedback could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('QuestionnaireFeedback.' . $this->QuestionnaireFeedback->primaryKey => $id));
			$this->request->data = $this->QuestionnaireFeedback->find('first', $options);
		}
		$questionnaires = $this->QuestionnaireFeedback->Questionnaire->find('list');
		$fieldGroups = $this->QuestionnaireFeedback->FieldGroup->find('list');
		$staffs = $this->QuestionnaireFeedback->Staff->find('list');
		$this->set(compact('questionnaires', 'fieldGroups', 'staffs'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->QuestionnaireFeedback->id = $id;
		if (!$this->QuestionnaireFeedback->exists()) {
			throw new NotFoundException(__('Invalid questionnaire feedback'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->QuestionnaireFeedback->delete()) {
			$this->Session->setFlash(__('The questionnaire feedback has been deleted.'));
		} else {
			$this->Session->setFlash(__('The questionnaire feedback could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
