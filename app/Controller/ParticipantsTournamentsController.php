<?php
App::uses('AppController', 'Controller');
/**
 * ParticipantsTournaments Controller
 *
 * @property ParticipantsTournament $ParticipantsTournament
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ParticipantsTournamentsController extends AppController {

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
		$this->ParticipantsTournament->recursive = 0;
		$this->set('participantsTournaments', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ParticipantsTournament->exists($id)) {
			throw new NotFoundException(__('Invalid participants tournament'));
		}
		$options = array('conditions' => array('ParticipantsTournament.' . $this->ParticipantsTournament->primaryKey => $id));
		$this->set('participantsTournament', $this->ParticipantsTournament->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ParticipantsTournament->create();
			if ($this->ParticipantsTournament->save($this->request->data)) {
				$this->Session->setFlash(__('The participants tournament has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The participants tournament could not be saved. Please, try again.'), 'flash/error');
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
        $this->ParticipantsTournament->id = $id;
		if (!$this->ParticipantsTournament->exists($id)) {
			throw new NotFoundException(__('Invalid participants tournament'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ParticipantsTournament->save($this->request->data)) {
				$this->Session->setFlash(__('The participants tournament has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The participants tournament could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('ParticipantsTournament.' . $this->ParticipantsTournament->primaryKey => $id));
			$this->request->data = $this->ParticipantsTournament->find('first', $options);
		}
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
		$this->ParticipantsTournament->id = $id;
		if (!$this->ParticipantsTournament->exists()) {
			throw new NotFoundException(__('Invalid participants tournament'));
		}
		if ($this->ParticipantsTournament->delete()) {
			$this->Session->setFlash(__('Participants tournament deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Participants tournament was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->ParticipantsTournament->recursive = 0;
		$this->set('participantsTournaments', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->ParticipantsTournament->exists($id)) {
			throw new NotFoundException(__('Invalid participants tournament'));
		}
		$options = array('conditions' => array('ParticipantsTournament.' . $this->ParticipantsTournament->primaryKey => $id));
		$this->set('participantsTournament', $this->ParticipantsTournament->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ParticipantsTournament->create();
			if ($this->ParticipantsTournament->save($this->request->data)) {
				$this->Session->setFlash(__('The participants tournament has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The participants tournament could not be saved. Please, try again.'), 'flash/error');
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
        $this->ParticipantsTournament->id = $id;
		if (!$this->ParticipantsTournament->exists($id)) {
			throw new NotFoundException(__('Invalid participants tournament'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ParticipantsTournament->save($this->request->data)) {
				$this->Session->setFlash(__('The participants tournament has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The participants tournament could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('ParticipantsTournament.' . $this->ParticipantsTournament->primaryKey => $id));
			$this->request->data = $this->ParticipantsTournament->find('first', $options);
		}
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
		$this->ParticipantsTournament->id = $id;
		if (!$this->ParticipantsTournament->exists()) {
			throw new NotFoundException(__('Invalid participants tournament'));
		}
		if ($this->ParticipantsTournament->delete()) {
			$this->Session->setFlash(__('Participants tournament deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Participants tournament was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
