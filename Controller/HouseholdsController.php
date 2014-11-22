<?php
App::uses('AppController', 'Controller');
/**
 * Households Controller
 *
 * @property Household $Household
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class HouseholdsController extends AppController {

     public function beforeFilter() {
        $this->Auth->allow();
    }
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
		$this->Household->recursive = 0;
		$this->set('households', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Household->exists($id)) {
			throw new NotFoundException(__('Invalid household'));
		}
		$options = array('conditions' => array('Household.' . $this->Household->primaryKey => $id));
		$this->set('household', $this->Household->find('first', $options));
	}

        public function getHouseholds() {
            if ($this->request->is('post')) {
                $households = $this->Household->find('all');
                //$this->set('households', $households);
                echo json_encode($households[0]);
            }
            
        }
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Household->create();
			if ($this->Household->save($this->request->data)) {
				$this->Session->setFlash(__('The household has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The household could not be saved. Please, try again.'));
			}
		}
		$fieldCommunities = $this->Household->FieldCommunity->find('list');
		$this->set(compact('fieldCommunities'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Household->exists($id)) {
			throw new NotFoundException(__('Invalid household'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Household->save($this->request->data)) {
				$this->Session->setFlash(__('The household has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The household could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Household.' . $this->Household->primaryKey => $id));
			$this->request->data = $this->Household->find('first', $options);
		}
		$fieldCommunities = $this->Household->FieldCommunity->find('list');
		$this->set(compact('fieldCommunities'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Household->id = $id;
		if (!$this->Household->exists()) {
			throw new NotFoundException(__('Invalid household'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Household->delete()) {
			$this->Session->setFlash(__('The household has been deleted.'));
		} else {
			$this->Session->setFlash(__('The household could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
