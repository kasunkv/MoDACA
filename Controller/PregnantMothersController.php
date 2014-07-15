<?php
App::uses('AppController', 'Controller');
/**
 * PregnantMothers Controller
 *
 * @property PregnantMother $PregnantMother
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PregnantMothersController extends AppController {

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
		$this->PregnantMother->recursive = 0;
		$this->set('pregnantMothers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PregnantMother->exists($id)) {
			throw new NotFoundException(__('Invalid pregnant mother'));
		}
		$options = array('conditions' => array('PregnantMother.' . $this->PregnantMother->primaryKey => $id));
		$this->set('pregnantMother', $this->PregnantMother->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PregnantMother->create();
			if ($this->PregnantMother->save($this->request->data)) {
				$this->Session->setFlash(__('The pregnant mother has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pregnant mother could not be saved. Please, try again.'));
			}
		}
		$households = $this->PregnantMother->Household->find('list');
		$familyMembers = $this->PregnantMother->FamilyMember->find('list');
		$this->set(compact('households', 'familyMembers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PregnantMother->exists($id)) {
			throw new NotFoundException(__('Invalid pregnant mother'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PregnantMother->save($this->request->data)) {
				$this->Session->setFlash(__('The pregnant mother has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pregnant mother could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PregnantMother.' . $this->PregnantMother->primaryKey => $id));
			$this->request->data = $this->PregnantMother->find('first', $options);
		}
		$households = $this->PregnantMother->Household->find('list');
		$familyMembers = $this->PregnantMother->FamilyMember->find('list');
		$this->set(compact('households', 'familyMembers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PregnantMother->id = $id;
		if (!$this->PregnantMother->exists()) {
			throw new NotFoundException(__('Invalid pregnant mother'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PregnantMother->delete()) {
			$this->Session->setFlash(__('The pregnant mother has been deleted.'));
		} else {
			$this->Session->setFlash(__('The pregnant mother could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
