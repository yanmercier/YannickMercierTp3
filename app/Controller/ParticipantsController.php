<?php
App::uses('AppController', 'Controller');
/**
 * Participants Controller
 *
 * @property Participant $Participant
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ParticipantsController extends AppController {

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
		$this->Participant->recursive = 0;
		$this->set('participants', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Participant->exists($id)) {
			throw new NotFoundException(__('Invalid participant'));
		}
		$options = array('conditions' => array('Participant.' . $this->Participant->primaryKey => $id));
		$this->set('participant', $this->Participant->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Participant->create();
			if ($this->Participant->save($this->request->data)) {
				$this->Session->setFlash(__('The participant has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The participant could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$players = $this->Participant->Player->find('list');
		$tournaments = $this->Participant->Tournament->find('list');
		$this->set(compact('players', 'tournaments'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Participant->id = $id;
		if (!$this->Participant->exists($id)) {
			throw new NotFoundException(__('Invalid participant'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Participant->save($this->request->data)) {
				$this->Session->setFlash(__('The participant has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The participant could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Participant.' . $this->Participant->primaryKey => $id));
			$this->request->data = $this->Participant->find('first', $options);
		}
		$players = $this->Participant->Player->find('list');
		$tournaments = $this->Participant->Tournament->find('list');
		$this->set(compact('players', 'tournaments'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Participant->id = $id;
		if (!$this->Participant->exists()) {
			throw new NotFoundException(__('Invalid participant'));
		}
		if ($this->Participant->delete()) {
			$this->Session->setFlash(__('Participant deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Participant was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Participant->recursive = 0;
		$this->set('participants', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Participant->exists($id)) {
			throw new NotFoundException(__('Invalid participant'));
		}
		$options = array('conditions' => array('Participant.' . $this->Participant->primaryKey => $id));
		$this->set('participant', $this->Participant->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Participant->create();
			if ($this->Participant->save($this->request->data)) {
				$this->Session->setFlash(__('The participant has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The participant could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$players = $this->Participant->Player->find('list');
		$tournaments = $this->Participant->Tournament->find('list');
		$this->set(compact('players', 'tournaments'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
        $this->Participant->id = $id;
		if (!$this->Participant->exists($id)) {
			throw new NotFoundException(__('Invalid participant'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Participant->save($this->request->data)) {
				$this->Session->setFlash(__('The participant has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The participant could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Participant.' . $this->Participant->primaryKey => $id));
			$this->request->data = $this->Participant->find('first', $options);
		}
		$players = $this->Participant->Player->find('list');
		$tournaments = $this->Participant->Tournament->find('list');
		$this->set(compact('players', 'tournaments'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Participant->id = $id;
		if (!$this->Participant->exists()) {
			throw new NotFoundException(__('Invalid participant'));
		}
		if ($this->Participant->delete()) {
			$this->Session->setFlash(__('Participant deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Participant was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
