<?php
App::uses('AppController', 'Controller');
/**
 * SaltUsages Controller
 *
 * @property SaltUsage $SaltUsage
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property SessionComponent $Session
 */
class SaltUsagesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->SaltUsage->recursive = 0;
		$this->set('saltUsages', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SaltUsage->exists($id)) {
			throw new NotFoundException(__('Invalid salt usage'));
		}
		$options = array('conditions' => array('SaltUsage.' . $this->SaltUsage->primaryKey => $id));
		$this->set('saltUsage', $this->SaltUsage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SaltUsage->create();
			if ($this->SaltUsage->save($this->request->data)) {
				$this->Session->setFlash(__('The salt usage has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The salt usage could not be saved. Please, try again.'));
			}
		}
		$households = $this->SaltUsage->Household->find('list');
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
		if (!$this->SaltUsage->exists($id)) {
			throw new NotFoundException(__('Invalid salt usage'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SaltUsage->save($this->request->data)) {
				$this->Session->setFlash(__('The salt usage has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The salt usage could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SaltUsage.' . $this->SaltUsage->primaryKey => $id));
			$this->request->data = $this->SaltUsage->find('first', $options);
		}
		$households = $this->SaltUsage->Household->find('list');
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
		$this->SaltUsage->id = $id;
		if (!$this->SaltUsage->exists()) {
			throw new NotFoundException(__('Invalid salt usage'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SaltUsage->delete()) {
			$this->Session->setFlash(__('The salt usage has been deleted.'));
		} else {
			$this->Session->setFlash(__('The salt usage could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
