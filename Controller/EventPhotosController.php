<?php
App::uses('AppController', 'Controller');
/**
 * EventPhotos Controller
 *
 * @property EventPhoto $EventPhoto
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class EventPhotosController extends AppController {

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
		$this->EventPhoto->recursive = 0;
		$this->set('eventPhotos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EventPhoto->exists($id)) {
			throw new NotFoundException(__('Invalid event photo'));
		}
		$options = array('conditions' => array('EventPhoto.' . $this->EventPhoto->primaryKey => $id));
		$this->set('eventPhoto', $this->EventPhoto->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EventPhoto->create();
			if ($this->EventPhoto->save($this->request->data)) {
				$this->Session->setFlash(__('The event photo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event photo could not be saved. Please, try again.'));
			}
		}
		$events = $this->EventPhoto->Event->find('list');
		$this->set(compact('events'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->EventPhoto->exists($id)) {
			throw new NotFoundException(__('Invalid event photo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->EventPhoto->save($this->request->data)) {
				$this->Session->setFlash(__('The event photo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event photo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EventPhoto.' . $this->EventPhoto->primaryKey => $id));
			$this->request->data = $this->EventPhoto->find('first', $options);
		}
		$events = $this->EventPhoto->Event->find('list');
		$this->set(compact('events'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->EventPhoto->id = $id;
		if (!$this->EventPhoto->exists()) {
			throw new NotFoundException(__('Invalid event photo'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EventPhoto->delete()) {
			$this->Session->setFlash(__('The event photo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The event photo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
