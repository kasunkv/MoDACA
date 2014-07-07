<?php
App::uses('AppController', 'Controller');
/**
 * PregnantMotherKnowledges Controller
 *
 * @property PregnantMotherKnowledge $PregnantMotherKnowledge
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PregnantMotherKnowledgesController extends AppController {

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
		$this->PregnantMotherKnowledge->recursive = 0;
		$this->set('pregnantMotherKnowledges', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PregnantMotherKnowledge->exists($id)) {
			throw new NotFoundException(__('Invalid pregnant mother knowledge'));
		}
		$options = array('conditions' => array('PregnantMotherKnowledge.' . $this->PregnantMotherKnowledge->primaryKey => $id));
		$this->set('pregnantMotherKnowledge', $this->PregnantMotherKnowledge->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PregnantMotherKnowledge->create();
			if ($this->PregnantMotherKnowledge->save($this->request->data)) {
				$this->Session->setFlash(__('The pregnant mother knowledge has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pregnant mother knowledge could not be saved. Please, try again.'));
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
		if (!$this->PregnantMotherKnowledge->exists($id)) {
			throw new NotFoundException(__('Invalid pregnant mother knowledge'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PregnantMotherKnowledge->save($this->request->data)) {
				$this->Session->setFlash(__('The pregnant mother knowledge has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pregnant mother knowledge could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PregnantMotherKnowledge.' . $this->PregnantMotherKnowledge->primaryKey => $id));
			$this->request->data = $this->PregnantMotherKnowledge->find('first', $options);
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
		$this->PregnantMotherKnowledge->id = $id;
		if (!$this->PregnantMotherKnowledge->exists()) {
			throw new NotFoundException(__('Invalid pregnant mother knowledge'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PregnantMotherKnowledge->delete()) {
			$this->Session->setFlash(__('The pregnant mother knowledge has been deleted.'));
		} else {
			$this->Session->setFlash(__('The pregnant mother knowledge could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
