<?php
App::uses('AppController', 'Controller');
/**
 * NavigationDetails Controller
 *
 * @property NavigationDetail $NavigationDetail
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class NavigationDetailsController extends AppController {

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
		$this->NavigationDetail->recursive = 0;
		$this->set('navigationDetails', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->NavigationDetail->exists($id)) {
			throw new NotFoundException(__('Invalid navigation detail'));
		}
		$options = array('conditions' => array('NavigationDetail.' . $this->NavigationDetail->primaryKey => $id));
		$this->set('navigationDetail', $this->NavigationDetail->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->NavigationDetail->create();
			if ($this->NavigationDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The navigation detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The navigation detail could not be saved. Please, try again.'));
			}
		}
		$households = $this->NavigationDetail->Household->find('list');
		$this->set(compact('households'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->NavigationDetail->exists($id)) {
			throw new NotFoundException(__('Invalid navigation detail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->NavigationDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The navigation detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The navigation detail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('NavigationDetail.' . $this->NavigationDetail->primaryKey => $id));
			$this->request->data = $this->NavigationDetail->find('first', $options);
		}
		$households = $this->NavigationDetail->Household->find('list');
		$this->set(compact('households'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->NavigationDetail->id = $id;
		if (!$this->NavigationDetail->exists()) {
			throw new NotFoundException(__('Invalid navigation detail'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->NavigationDetail->delete()) {
			$this->Session->setFlash(__('The navigation detail has been deleted.'));
		} else {
			$this->Session->setFlash(__('The navigation detail could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
