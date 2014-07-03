<?php
App::uses('AppController', 'Controller');
/**
 * ChildGrowths Controller
 *
 * @property ChildGrowth $ChildGrowth
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ChildGrowthsController extends AppController {

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
		$this->ChildGrowth->recursive = 0;
		$this->set('childGrowths', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ChildGrowth->exists($id)) {
			throw new NotFoundException(__('Invalid child growth'));
		}
		$options = array('conditions' => array('ChildGrowth.' . $this->ChildGrowth->primaryKey => $id));
		$this->set('childGrowth', $this->ChildGrowth->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ChildGrowth->create();
			if ($this->ChildGrowth->save($this->request->data)) {
				$this->Session->setFlash(__('The child growth has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The child growth could not be saved. Please, try again.'));
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
		if (!$this->ChildGrowth->exists($id)) {
			throw new NotFoundException(__('Invalid child growth'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ChildGrowth->save($this->request->data)) {
				$this->Session->setFlash(__('The child growth has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The child growth could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ChildGrowth.' . $this->ChildGrowth->primaryKey => $id));
			$this->request->data = $this->ChildGrowth->find('first', $options);
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
		$this->ChildGrowth->id = $id;
		if (!$this->ChildGrowth->exists()) {
			throw new NotFoundException(__('Invalid child growth'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ChildGrowth->delete()) {
			$this->Session->setFlash(__('The child growth has been deleted.'));
		} else {
			$this->Session->setFlash(__('The child growth could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
