<?php
App::uses('AppController', 'Controller');
/**
 * OilUsages Controller
 *
 * @property OilUsage $OilUsage
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class OilUsagesController extends AppController {

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
		$this->OilUsage->recursive = 0;
		$this->set('oilUsages', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OilUsage->exists($id)) {
			throw new NotFoundException(__('Invalid oil usage'));
		}
		$options = array('conditions' => array('OilUsage.' . $this->OilUsage->primaryKey => $id));
		$this->set('oilUsage', $this->OilUsage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OilUsage->create();
			if ($this->OilUsage->save($this->request->data)) {
				$this->Session->setFlash(__('The oil usage has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The oil usage could not be saved. Please, try again.'));
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
		if (!$this->OilUsage->exists($id)) {
			throw new NotFoundException(__('Invalid oil usage'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OilUsage->save($this->request->data)) {
				$this->Session->setFlash(__('The oil usage has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The oil usage could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OilUsage.' . $this->OilUsage->primaryKey => $id));
			$this->request->data = $this->OilUsage->find('first', $options);
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
		$this->OilUsage->id = $id;
		if (!$this->OilUsage->exists()) {
			throw new NotFoundException(__('Invalid oil usage'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->OilUsage->delete()) {
			$this->Session->setFlash(__('The oil usage has been deleted.'));
		} else {
			$this->Session->setFlash(__('The oil usage could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
