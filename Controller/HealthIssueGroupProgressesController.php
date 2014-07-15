<?php
App::uses('AppController', 'Controller');
/**
 * HealthIssueGroupProgresses Controller
 *
 * @property HealthIssueGroupProgress $HealthIssueGroupProgress
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class HealthIssueGroupProgressesController extends AppController {

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
		$this->HealthIssueGroupProgress->recursive = 0;
		$this->set('healthIssueGroupProgresses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->HealthIssueGroupProgress->exists($id)) {
			throw new NotFoundException(__('Invalid health issue group progress'));
		}
		$options = array('conditions' => array('HealthIssueGroupProgress.' . $this->HealthIssueGroupProgress->primaryKey => $id));
		$this->set('healthIssueGroupProgress', $this->HealthIssueGroupProgress->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->HealthIssueGroupProgress->create();
			if ($this->HealthIssueGroupProgress->save($this->request->data)) {
				$this->Session->setFlash(__('The health issue group progress has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The health issue group progress could not be saved. Please, try again.'));
			}
		}
		$healthIssueGroups = $this->HealthIssueGroupProgress->HealthIssueGroup->find('list');
		$indicators = $this->HealthIssueGroupProgress->Indicator->find('list');
		$this->set(compact('healthIssueGroups', 'indicators'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->HealthIssueGroupProgress->exists($id)) {
			throw new NotFoundException(__('Invalid health issue group progress'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->HealthIssueGroupProgress->save($this->request->data)) {
				$this->Session->setFlash(__('The health issue group progress has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The health issue group progress could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('HealthIssueGroupProgress.' . $this->HealthIssueGroupProgress->primaryKey => $id));
			$this->request->data = $this->HealthIssueGroupProgress->find('first', $options);
		}
		$healthIssueGroups = $this->HealthIssueGroupProgress->HealthIssueGroup->find('list');
		$indicators = $this->HealthIssueGroupProgress->Indicator->find('list');
		$this->set(compact('healthIssueGroups', 'indicators'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->HealthIssueGroupProgress->id = $id;
		if (!$this->HealthIssueGroupProgress->exists()) {
			throw new NotFoundException(__('Invalid health issue group progress'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->HealthIssueGroupProgress->delete()) {
			$this->Session->setFlash(__('The health issue group progress has been deleted.'));
		} else {
			$this->Session->setFlash(__('The health issue group progress could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
