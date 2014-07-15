<?php
App::uses('AppController', 'Controller');
/**
 * Legends Controller
 *
 * @property Legend $Legend
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class LegendsController extends AppController {

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
		$this->Legend->recursive = 0;
		$this->set('legends', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Legend->exists($id)) {
			throw new NotFoundException(__('Invalid legend'));
		}
		$options = array('conditions' => array('Legend.' . $this->Legend->primaryKey => $id));
		$this->set('legend', $this->Legend->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Legend->create();
			if ($this->Legend->save($this->request->data)) {
				$this->Session->setFlash(__('The legend has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The legend could not be saved. Please, try again.'));
			}
		}
		$questionnaires = $this->Legend->Questionnaire->find('list');
		$this->set(compact('questionnaires'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Legend->exists($id)) {
			throw new NotFoundException(__('Invalid legend'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Legend->save($this->request->data)) {
				$this->Session->setFlash(__('The legend has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The legend could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Legend.' . $this->Legend->primaryKey => $id));
			$this->request->data = $this->Legend->find('first', $options);
		}
		$questionnaires = $this->Legend->Questionnaire->find('list');
		$this->set(compact('questionnaires'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Legend->id = $id;
		if (!$this->Legend->exists()) {
			throw new NotFoundException(__('Invalid legend'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Legend->delete()) {
			$this->Session->setFlash(__('The legend has been deleted.'));
		} else {
			$this->Session->setFlash(__('The legend could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
