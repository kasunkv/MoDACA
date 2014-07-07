<?php
App::uses('AppController', 'Controller');
/**
 * HealthIssueInCommunities Controller
 *
 * @property HealthIssueInCommunity $HealthIssueInCommunity
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class HealthIssueInCommunitiesController extends AppController {

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
		$this->HealthIssueInCommunity->recursive = 0;
		$this->set('healthIssueInCommunities', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->HealthIssueInCommunity->exists($id)) {
			throw new NotFoundException(__('Invalid health issue in community'));
		}
		$options = array('conditions' => array('HealthIssueInCommunity.' . $this->HealthIssueInCommunity->primaryKey => $id));
		$this->set('healthIssueInCommunity', $this->HealthIssueInCommunity->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->HealthIssueInCommunity->create();
			if ($this->HealthIssueInCommunity->save($this->request->data)) {
				$this->Session->setFlash(__('The health issue in community has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The health issue in community could not be saved. Please, try again.'));
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
		if (!$this->HealthIssueInCommunity->exists($id)) {
			throw new NotFoundException(__('Invalid health issue in community'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->HealthIssueInCommunity->save($this->request->data)) {
				$this->Session->setFlash(__('The health issue in community has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The health issue in community could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('HealthIssueInCommunity.' . $this->HealthIssueInCommunity->primaryKey => $id));
			$this->request->data = $this->HealthIssueInCommunity->find('first', $options);
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
		$this->HealthIssueInCommunity->id = $id;
		if (!$this->HealthIssueInCommunity->exists()) {
			throw new NotFoundException(__('Invalid health issue in community'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->HealthIssueInCommunity->delete()) {
			$this->Session->setFlash(__('The health issue in community has been deleted.'));
		} else {
			$this->Session->setFlash(__('The health issue in community could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
