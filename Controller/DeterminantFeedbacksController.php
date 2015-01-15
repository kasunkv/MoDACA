<?php
App::uses('AppController', 'Controller');
/**
 * DeterminantFeedbacks Controller
 *
 * @property DeterminantFeedback $DeterminantFeedback
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DeterminantFeedbacksController extends AppController {

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
		$this->DeterminantFeedback->recursive = 0;
		$this->set('determinantFeedbacks', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DeterminantFeedback->exists($id)) {
			throw new NotFoundException(__('Invalid determinant feedback'));
		}
		$options = array('conditions' => array('DeterminantFeedback.' . $this->DeterminantFeedback->primaryKey => $id));
		$this->set('determinantFeedback', $this->DeterminantFeedback->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DeterminantFeedback->create();
			if ($this->DeterminantFeedback->save($this->request->data)) {
				$this->Session->setFlash(__('The determinant feedback has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The determinant feedback could not be saved. Please, try again.'));
			}
		}
		$determinants = $this->DeterminantFeedback->Determinant->find('list');
		$fieldGroups = $this->DeterminantFeedback->FieldGroup->find('list');
		$staffs = $this->DeterminantFeedback->Staff->find('list');
		$this->set(compact('determinants', 'fieldGroups', 'staffs'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->DeterminantFeedback->exists($id)) {
			throw new NotFoundException(__('Invalid determinant feedback'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DeterminantFeedback->save($this->request->data)) {
				$this->Session->setFlash(__('The determinant feedback has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The determinant feedback could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DeterminantFeedback.' . $this->DeterminantFeedback->primaryKey => $id));
			$this->request->data = $this->DeterminantFeedback->find('first', $options);
		}
		$determinants = $this->DeterminantFeedback->Determinant->find('list');
		$fieldGroups = $this->DeterminantFeedback->FieldGroup->find('list');
		$staffs = $this->DeterminantFeedback->Staff->find('list');
		$this->set(compact('determinants', 'fieldGroups', 'staffs'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->DeterminantFeedback->id = $id;
		if (!$this->DeterminantFeedback->exists()) {
			throw new NotFoundException(__('Invalid determinant feedback'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->DeterminantFeedback->delete()) {
			$this->Session->setFlash(__('The determinant feedback has been deleted.'));
		} else {
			$this->Session->setFlash(__('The determinant feedback could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
