<?php
App::uses('AppController', 'Controller');
/**
 * Bmis Controller
 *
 * @property Bmi $Bmi
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class BmisController extends AppController {

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
		$this->Bmi->recursive = 0;
		$this->set('bmis', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Bmi->exists($id)) {
			throw new NotFoundException(__('Invalid bmi'));
		}
		$options = array('conditions' => array('Bmi.' . $this->Bmi->primaryKey => $id));
		$this->set('bmi', $this->Bmi->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Bmi->create();
			if ($this->Bmi->save($this->request->data)) {
				$this->Session->setFlash(__('The bmi has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bmi could not be saved. Please, try again.'));
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
		if (!$this->Bmi->exists($id)) {
			throw new NotFoundException(__('Invalid bmi'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Bmi->save($this->request->data)) {
				$this->Session->setFlash(__('The bmi has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bmi could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Bmi.' . $this->Bmi->primaryKey => $id));
			$this->request->data = $this->Bmi->find('first', $options);
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
		$this->Bmi->id = $id;
		if (!$this->Bmi->exists()) {
			throw new NotFoundException(__('Invalid bmi'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Bmi->delete()) {
			$this->Session->setFlash(__('The bmi has been deleted.'));
		} else {
			$this->Session->setFlash(__('The bmi could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
