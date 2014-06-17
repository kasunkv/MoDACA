<?php
App::uses('AppController', 'Controller');
/**
 * PMKQuestions Controller
 *
 * @property PMKQuestion $PMKQuestion
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PMKQuestionsController extends AppController {

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
		$this->PMKQuestion->recursive = 0;
		$this->set('pMKQuestions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PMKQuestion->exists($id)) {
			throw new NotFoundException(__('Invalid p m k question'));
		}
		$options = array('conditions' => array('PMKQuestion.' . $this->PMKQuestion->primaryKey => $id));
		$this->set('pMKQuestion', $this->PMKQuestion->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PMKQuestion->create();
			if ($this->PMKQuestion->save($this->request->data)) {
				$this->Session->setFlash(__('The p m k question has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The p m k question could not be saved. Please, try again.'));
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
		if (!$this->PMKQuestion->exists($id)) {
			throw new NotFoundException(__('Invalid p m k question'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PMKQuestion->save($this->request->data)) {
				$this->Session->setFlash(__('The p m k question has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The p m k question could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PMKQuestion.' . $this->PMKQuestion->primaryKey => $id));
			$this->request->data = $this->PMKQuestion->find('first', $options);
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
		$this->PMKQuestion->id = $id;
		if (!$this->PMKQuestion->exists()) {
			throw new NotFoundException(__('Invalid p m k question'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PMKQuestion->delete()) {
			$this->Session->setFlash(__('The p m k question has been deleted.'));
		} else {
			$this->Session->setFlash(__('The p m k question could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
