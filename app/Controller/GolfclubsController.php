<?php
App::uses('AppController', 'Controller');
/**
 * Golfclubs Controller
 *
 * @property Golfclub $Golfclub
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class GolfclubsController extends AppController {

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
		$this->Golfclub->recursive = 0;
		$this->set('golfclubs', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Golfclub->exists($id)) {
			throw new NotFoundException(__('Invalid golfclub'));
		}
		$options = array('conditions' => array('Golfclub.' . $this->Golfclub->primaryKey => $id));
		$this->set('golfclub', $this->Golfclub->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Golfclub->create();
			if ($this->Golfclub->save($this->request->data)) {
				$this->Session->setFlash(__('The golfclub has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The golfclub could not be saved. Please, try again.'), 'flash/error');
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
        $this->Golfclub->id = $id;
		if (!$this->Golfclub->exists($id)) {
			throw new NotFoundException(__('Invalid golfclub'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Golfclub->save($this->request->data)) {
				$this->Session->setFlash(__('The golfclub has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The golfclub could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Golfclub.' . $this->Golfclub->primaryKey => $id));
			$this->request->data = $this->Golfclub->find('first', $options);
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
		$this->Golfclub->id = $id;
		if (!$this->Golfclub->exists()) {
			throw new NotFoundException(__('Invalid golfclub'));
		}
		if ($this->Golfclub->delete()) {
			$this->Session->setFlash(__('Golfclub deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Golfclub was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Golfclub->recursive = 0;
		$this->set('golfclubs', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Golfclub->exists($id)) {
			throw new NotFoundException(__('Invalid golfclub'));
		}
		$options = array('conditions' => array('Golfclub.' . $this->Golfclub->primaryKey => $id));
		$this->set('golfclub', $this->Golfclub->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Golfclub->create();
			if ($this->Golfclub->save($this->request->data)) {
				$this->Session->setFlash(__('The golfclub has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The golfclub could not be saved. Please, try again.'), 'flash/error');
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
        $this->Golfclub->id = $id;
		if (!$this->Golfclub->exists($id)) {
			throw new NotFoundException(__('Invalid golfclub'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Golfclub->save($this->request->data)) {
				$this->Session->setFlash(__('The golfclub has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The golfclub could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Golfclub.' . $this->Golfclub->primaryKey => $id));
			$this->request->data = $this->Golfclub->find('first', $options);
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
		$this->Golfclub->id = $id;
		if (!$this->Golfclub->exists()) {
			throw new NotFoundException(__('Invalid golfclub'));
		}
		if ($this->Golfclub->delete()) {
			$this->Session->setFlash(__('Golfclub deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Golfclub was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
