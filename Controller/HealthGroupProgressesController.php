<?php
App::uses('AppController', 'Controller');
/**
 * HealthGroupProgresses Controller
 *
 * @property HealthGroupProgress $HealthGroupProgress
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class HealthGroupProgressesController extends AppController {

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
		$this->HealthGroupProgress->recursive = 0;
		$this->set('healthGroupProgresses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->HealthGroupProgress->exists($id)) {
			throw new NotFoundException(__('Invalid health group progress'));
		}
		$options = array('conditions' => array('HealthGroupProgress.' . $this->HealthGroupProgress->primaryKey => $id));
		$this->set('healthGroupProgress', $this->HealthGroupProgress->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->HealthGroupProgress->create();
			if ($this->HealthGroupProgress->save($this->request->data)) {
				$this->Session->setFlash(__('The health group progress has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The health group progress could not be saved. Please, try again.'));
			}
		}
		$healthGroups = $this->HealthGroupProgress->HealthGroup->find('list');
		$indicators = $this->HealthGroupProgress->Indicator->find('list');
		$healthIssues = $this->HealthGroupProgress->HealthIssue->find('list');
		$this->set(compact('healthGroups', 'indicators', 'healthIssues'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->HealthGroupProgress->exists($id)) {
			throw new NotFoundException(__('Invalid health group progress'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->HealthGroupProgress->save($this->request->data)) {
				$this->Session->setFlash(__('The health group progress has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The health group progress could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('HealthGroupProgress.' . $this->HealthGroupProgress->primaryKey => $id));
			$this->request->data = $this->HealthGroupProgress->find('first', $options);
		}
		$healthGroups = $this->HealthGroupProgress->HealthGroup->find('list');
		$indicators = $this->HealthGroupProgress->Indicator->find('list');
		$healthIssues = $this->HealthGroupProgress->HealthIssue->find('list');
		$this->set(compact('healthGroups', 'indicators', 'healthIssues'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->HealthGroupProgress->id = $id;
		if (!$this->HealthGroupProgress->exists()) {
			throw new NotFoundException(__('Invalid health group progress'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->HealthGroupProgress->delete()) {
			$this->Session->setFlash(__('The health group progress has been deleted.'));
		} else {
			$this->Session->setFlash(__('The health group progress could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
