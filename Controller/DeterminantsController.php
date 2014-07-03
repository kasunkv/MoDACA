<?php
App::uses('AppController', 'Controller');
/**
 * Determinants Controller
 *
 * @property Determinant $Determinant
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DeterminantsController extends AppController {

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
		$this->Determinant->recursive = 0;
		$this->set('determinants', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Determinant->exists($id)) {
			throw new NotFoundException(__('Invalid determinant'));
		}
		$options = array('conditions' => array('Determinant.' . $this->Determinant->primaryKey => $id));
		$this->set('determinant', $this->Determinant->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Determinant->create();
			if ($this->Determinant->save($this->request->data)) {
				$this->Session->setFlash(__('The determinant has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The determinant could not be saved. Please, try again.'));
			}
		}
		$healthIssues = $this->Determinant->HealthIssue->find('list');
		$this->set(compact('healthIssues'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Determinant->exists($id)) {
			throw new NotFoundException(__('Invalid determinant'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Determinant->save($this->request->data)) {
				$this->Session->setFlash(__('The determinant has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The determinant could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Determinant.' . $this->Determinant->primaryKey => $id));
			$this->request->data = $this->Determinant->find('first', $options);
		}
		$healthIssues = $this->Determinant->HealthIssue->find('list');
		$this->set(compact('healthIssues'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Determinant->id = $id;
		if (!$this->Determinant->exists()) {
			throw new NotFoundException(__('Invalid determinant'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Determinant->delete()) {
			$this->Session->setFlash(__('The determinant has been deleted.'));
		} else {
			$this->Session->setFlash(__('The determinant could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
