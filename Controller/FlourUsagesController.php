<?php
App::uses('AppController', 'Controller');
/**
 * FlourUsages Controller
 *
 * @property FlourUsage $FlourUsage
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class FlourUsagesController extends AppController {

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
		$this->FlourUsage->recursive = 0;
		$this->set('flourUsages', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FlourUsage->exists($id)) {
			throw new NotFoundException(__('Invalid flour usage'));
		}
		$options = array('conditions' => array('FlourUsage.' . $this->FlourUsage->primaryKey => $id));
		$this->set('flourUsage', $this->FlourUsage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FlourUsage->create();
			if ($this->FlourUsage->save($this->request->data)) {
				$this->Session->setFlash(__('The flour usage has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The flour usage could not be saved. Please, try again.'));
			}
		}
		$households = $this->FlourUsage->Household->find('list');
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
		if (!$this->FlourUsage->exists($id)) {
			throw new NotFoundException(__('Invalid flour usage'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FlourUsage->save($this->request->data)) {
				$this->Session->setFlash(__('The flour usage has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The flour usage could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FlourUsage.' . $this->FlourUsage->primaryKey => $id));
			$this->request->data = $this->FlourUsage->find('first', $options);
		}
		$households = $this->FlourUsage->Household->find('list');
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
		$this->FlourUsage->id = $id;
		if (!$this->FlourUsage->exists()) {
			throw new NotFoundException(__('Invalid flour usage'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FlourUsage->delete()) {
			$this->Session->setFlash(__('The flour usage has been deleted.'));
		} else {
			$this->Session->setFlash(__('The flour usage could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
