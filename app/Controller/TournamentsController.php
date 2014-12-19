<?php

App::uses('AppController', 'Controller');

/**
 * Tournaments Controller
 *
 * @property Tournament $Tournament
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TournamentsController extends AppController {
    
    /**
     * Components
     *
     * @var array
     */
    
    public $helpers = array('Js');
    public $components = array('Paginator', 'Session', 'RequestHandler');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Tournament->recursive = 0;
        $this->set('tournaments', $this->paginate());
    }

    public function isAuthorized($user) {
        if ($this->action === 'add') {
            return true;
        }

        if (in_array($this->action, array('edit', 'delete'))) {
            $tournamentId = (int) $this->request->params['pass'][0];
            if ($this->Tournament->isOwnedBy($tournamentId, $user['id'])) {
                return true;
            }
            if (!isset($user['role']) && $user['role'] === 'admin') {
                $this->Session->setFlash(__('This tournament doesn\'t belong to you.'), 'flash/error');
            }
        }

        return parent::isAuthorized($user);
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Tournament->exists($id)) {
            throw new NotFoundException(__('Invalid tournament'));
        }
        $options = array('conditions' => array('Tournament.' . $this->Tournament->primaryKey => $id));
        $this->set('tournament', $this->Tournament->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        
        if ($this->request->is('ajax')) {
            $term = $this->request->query('term');
            $cartNames = $this->Cart->getCartNames($term);
            $this->set(compact('cartNames'));
            $this->set('_serialize', 'cartNames');
        }
        
        if ($this->request->is('post')) {
            $this->request->data['Tournament']['user_id'] = $this->Auth->user('id');
            if ($this->Tournament->save($this->request->data)) {
                $this->Session->setFlash(__('The tournament has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The tournament could not be saved. Please, try again.'), 'flash/error');
            }
        }
        $users = $this->Tournament->User->find('list');
        $golfclubs = $this->Tournament->Golfclub->find('list');
        $participants = $this->Tournament->Participant->find('list');
        $countries = $this->Tournament->Sponsor->Country->find('list');
	$sponsors = $this->Tournament->Sponsor->find('list');
        $this->set(compact('users', 'golfclubs', 'participants', 'sponsors', 'countries'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if($this->Session->read('Auth.User.active') == 1){
            $this->Tournament->id = $id;
            if (!$this->Tournament->exists($id)) {
                throw new NotFoundException(__('Invalid tournament'));
            }
            if ($this->request->is('post') || $this->request->is('put')) {
                if ($this->Tournament->save($this->request->data)) {
                    $this->Session->setFlash(__('The tournament has been saved'), 'flash/success');
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The tournament could not be saved. Please, try again.'), 'flash/error');
                }
            } else {
                $options = array('conditions' => array('Tournament.' . $this->Tournament->primaryKey => $id));
                $this->request->data = $this->Tournament->find('first', $options);
            }
            $users = $this->Tournament->User->find('list');
            $golfclubs = $this->Tournament->Golfclub->find('list');
            $participants = $this->Tournament->Participant->find('list');
            $countries = $this->Tournament->Sponsor->Country->find('list');
            $sponsors = $this->Tournament->Sponsor->find('list');
            $this->set(compact('users', 'golfclubs', 'participants', 'countries', 'sponsors'));
        }else {
            $this->redirect(array('controller' => 'users','action' => 'restriction'));
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
        $this->Tournament->id = $id;
        if (!$this->Tournament->exists()) {
            throw new NotFoundException(__('Invalid tournament'));
        }
        if ($this->Tournament->delete()) {
            $this->Session->setFlash(__('Tournament deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Tournament was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Tournament->recursive = 0;
        $this->set('tournaments', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Tournament->exists($id)) {
            throw new NotFoundException(__('Invalid tournament'));
        }
        $options = array('conditions' => array('Tournament.' . $this->Tournament->primaryKey => $id));
        $this->set('tournament', $this->Tournament->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Tournament->create();
            if ($this->Tournament->save($this->request->data)) {
                $this->Session->setFlash(__('The tournament has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The tournament could not be saved. Please, try again.'), 'flash/error');
            }
        }
        $users = $this->Tournament->User->find('list');
        $golfclubs = $this->Tournament->Golfclub->find('list');
        $participants = $this->Tournament->Participant->find('list');
        $this->set(compact('users', 'golfclubs', 'participants'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->Tournament->id = $id;
        if (!$this->Tournament->exists($id)) {
            throw new NotFoundException(__('Invalid tournament'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Tournament->save($this->request->data)) {
                $this->Session->setFlash(__('The tournament has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The tournament could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Tournament.' . $this->Tournament->primaryKey => $id));
            $this->request->data = $this->Tournament->find('first', $options);
        }
        $users = $this->Tournament->User->find('list');
        $golfclubs = $this->Tournament->Golfclub->find('list');
        $participants = $this->Tournament->Participant->find('list');
        $this->set(compact('users', 'golfclubs', 'participants'));
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
        $this->Tournament->id = $id;
        if (!$this->Tournament->exists()) {
            throw new NotFoundException(__('Invalid tournament'));
        }
        if ($this->Tournament->delete()) {
            $this->Session->setFlash(__('Tournament deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Tournament was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

}
