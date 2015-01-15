<?php
App::uses('AppController', 'Controller');
/**
 * StudentFeedbacks Controller
 *
 * @property StudentFeedback $StudentFeedback
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class StudentFeedbacksController extends AppController {

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
		$this->StudentFeedback->recursive = 0;
		$this->set('studentFeedbacks', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->StudentFeedback->exists($id)) {
			throw new NotFoundException(__('Invalid student feedback'));
		}
		$options = array('conditions' => array('StudentFeedback.' . $this->StudentFeedback->primaryKey => $id));
		$this->set('studentFeedback', $this->StudentFeedback->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StudentFeedback->create();
			if ($this->StudentFeedback->save($this->request->data)) {
				$this->Session->setFlash(__('The student feedback has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The student feedback could not be saved. Please, try again.'));
			}
		}
		$students = $this->StudentFeedback->Student->find('list');
		$staffs = $this->StudentFeedback->Staff->find('list');
		$this->set(compact('students', 'staffs'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->StudentFeedback->exists($id)) {
			throw new NotFoundException(__('Invalid student feedback'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->StudentFeedback->save($this->request->data)) {
				$this->Session->setFlash(__('The student feedback has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The student feedback could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('StudentFeedback.' . $this->StudentFeedback->primaryKey => $id));
			$this->request->data = $this->StudentFeedback->find('first', $options);
		}
		$students = $this->StudentFeedback->Student->find('list');
		$staffs = $this->StudentFeedback->Staff->find('list');
		$this->set(compact('students', 'staffs'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->StudentFeedback->id = $id;
		if (!$this->StudentFeedback->exists()) {
			throw new NotFoundException(__('Invalid student feedback'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->StudentFeedback->delete()) {
			$this->Session->setFlash(__('The student feedback has been deleted.'));
		} else {
			$this->Session->setFlash(__('The student feedback could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
