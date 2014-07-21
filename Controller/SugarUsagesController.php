<?php
App::uses('AppController', 'Controller');
/**
 * SugarUsages Controller
 *
 * @property SugarUsage $SugarUsage
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property SessionComponent $Session
 */
class SugarUsagesController extends AppController {

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
		$this->SugarUsage->recursive = 0;
		$this->set('sugarUsages', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SugarUsage->exists($id)) {
			throw new NotFoundException(__('Invalid sugar usage'));
		}
		$options = array('conditions' => array('SugarUsage.' . $this->SugarUsage->primaryKey => $id));
		$this->set('sugarUsage', $this->SugarUsage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SugarUsage->create();
			if ($this->SugarUsage->save($this->request->data)) {
				$this->Session->setFlash(__('The sugar usage has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sugar usage could not be saved. Please, try again.'));
			}
		}
		$households = $this->SugarUsage->Household->find('list');
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
		if (!$this->SugarUsage->exists($id)) {
			throw new NotFoundException(__('Invalid sugar usage'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SugarUsage->save($this->request->data)) {
				$this->Session->setFlash(__('The sugar usage has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sugar usage could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SugarUsage.' . $this->SugarUsage->primaryKey => $id));
			$this->request->data = $this->SugarUsage->find('first', $options);
		}
		$households = $this->SugarUsage->Household->find('list');
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
		$this->SugarUsage->id = $id;
		if (!$this->SugarUsage->exists()) {
			throw new NotFoundException(__('Invalid sugar usage'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SugarUsage->delete()) {
			$this->Session->setFlash(__('The sugar usage has been deleted.'));
		} else {
			$this->Session->setFlash(__('The sugar usage could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
