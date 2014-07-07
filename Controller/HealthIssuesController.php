<?php
App::uses('AppController', 'Controller');
/**
 * HealthIssues Controller
 *
 * @property HealthIssue $HealthIssue
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class HealthIssuesController extends AppController {

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
		$this->HealthIssue->recursive = 0;
		$this->set('healthIssues', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->HealthIssue->exists($id)) {
			throw new NotFoundException(__('Invalid health issue'));
		}
		$options = array('conditions' => array('HealthIssue.' . $this->HealthIssue->primaryKey => $id));
		$this->set('healthIssue', $this->HealthIssue->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->HealthIssue->create();
			if ($this->HealthIssue->save($this->request->data)) {
				$this->Session->setFlash(__('The health issue has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The health issue could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->HealthIssue->exists($id)) {
			throw new NotFoundException(__('Invalid health issue'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->HealthIssue->save($this->request->data)) {
				$this->Session->setFlash(__('The health issue has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The health issue could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('HealthIssue.' . $this->HealthIssue->primaryKey => $id));
			$this->request->data = $this->HealthIssue->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->HealthIssue->id = $id;
		if (!$this->HealthIssue->exists()) {
			throw new NotFoundException(__('Invalid health issue'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->HealthIssue->delete()) {
			$this->Session->setFlash(__('The health issue has been deleted.'));
		} else {
			$this->Session->setFlash(__('The health issue could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
