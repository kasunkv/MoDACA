<?php
App::uses('AppController', 'Controller');
/**
 * HealthIssueCommunities Controller
 *
 * @property HealthIssueCommunity $HealthIssueCommunity
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class HealthIssueCommunitiesController extends AppController {

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
		$this->HealthIssueCommunity->recursive = 0;
		$this->set('healthIssueCommunities', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->HealthIssueCommunity->exists($id)) {
			throw new NotFoundException(__('Invalid health issue community'));
		}
		$options = array('conditions' => array('HealthIssueCommunity.' . $this->HealthIssueCommunity->primaryKey => $id));
		$this->set('healthIssueCommunity', $this->HealthIssueCommunity->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->HealthIssueCommunity->create();
			if ($this->HealthIssueCommunity->save($this->request->data)) {
				$this->Session->setFlash(__('The health issue community has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The health issue community could not be saved. Please, try again.'));
			}
		}
		$fieldCommunities = $this->HealthIssueCommunity->FieldCommunity->find('list');
		$healthIssues = $this->HealthIssueCommunity->HealthIssue->find('list');
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
		if (!$this->HealthIssueCommunity->exists($id)) {
			throw new NotFoundException(__('Invalid health issue community'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->HealthIssueCommunity->save($this->request->data)) {
				$this->Session->setFlash(__('The health issue community has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The health issue community could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('HealthIssueCommunity.' . $this->HealthIssueCommunity->primaryKey => $id));
			$this->request->data = $this->HealthIssueCommunity->find('first', $options);
		}
		$fieldCommunities = $this->HealthIssueCommunity->FieldCommunity->find('list');
		$healthIssues = $this->HealthIssueCommunity->HealthIssue->find('list');
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
		$this->HealthIssueCommunity->id = $id;
		if (!$this->HealthIssueCommunity->exists()) {
			throw new NotFoundException(__('Invalid health issue community'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->HealthIssueCommunity->delete()) {
			$this->Session->setFlash(__('The health issue community has been deleted.'));
		} else {
			$this->Session->setFlash(__('The health issue community could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
