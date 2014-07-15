<?php
App::uses('AppController', 'Controller');
/**
 * HealthIssueGroups Controller
 *
 * @property HealthIssueGroup $HealthIssueGroup
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class HealthIssueGroupsController extends AppController {

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
		$this->HealthIssueGroup->recursive = 0;
		$this->set('healthIssueGroups', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->HealthIssueGroup->exists($id)) {
			throw new NotFoundException(__('Invalid health issue group'));
		}
		$options = array('conditions' => array('HealthIssueGroup.' . $this->HealthIssueGroup->primaryKey => $id));
		$this->set('healthIssueGroup', $this->HealthIssueGroup->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->HealthIssueGroup->create();
			if ($this->HealthIssueGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The health issue group has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The health issue group could not be saved. Please, try again.'));
			}
		}
		$fieldCommunities = $this->HealthIssueGroup->FieldCommunity->find('list');
		$healthIssues = $this->HealthIssueGroup->HealthIssue->find('list');
		$this->set(compact('fieldCommunities', 'healthIssues'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->HealthIssueGroup->exists($id)) {
			throw new NotFoundException(__('Invalid health issue group'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->HealthIssueGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The health issue group has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The health issue group could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('HealthIssueGroup.' . $this->HealthIssueGroup->primaryKey => $id));
			$this->request->data = $this->HealthIssueGroup->find('first', $options);
		}
		$fieldCommunities = $this->HealthIssueGroup->FieldCommunity->find('list');
		$healthIssues = $this->HealthIssueGroup->HealthIssue->find('list');
		$this->set(compact('fieldCommunities', 'healthIssues'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->HealthIssueGroup->id = $id;
		if (!$this->HealthIssueGroup->exists()) {
			throw new NotFoundException(__('Invalid health issue group'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->HealthIssueGroup->delete()) {
			$this->Session->setFlash(__('The health issue group has been deleted.'));
		} else {
			$this->Session->setFlash(__('The health issue group could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
