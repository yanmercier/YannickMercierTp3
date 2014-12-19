<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsersController extends AppController {

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
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}
	
	public function beforeFilter() {
    parent::beforeFilter();
    // Allow users to register and logout.
    $this->Auth->allow('add', 'logout');
}

	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirect());
			}
			$this->Session->setFlash(__('Invalid username or password, try again'));
		}
	}

	public function logout() {
		return $this->redirect($this->Auth->logout());
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}	
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
                                $newUser = $this->request->data;
                                $link = array('controller' => 'users', 'action' => 'activate', $this->User->id . '-' . $this->User->username);
                                $this->send_mail($newUser['User']['email'], $newUser['User']['username'], $newUser['User']['password'], $link);
				$this->redirect(array('controller' => 'tournaments', 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/error');
			}
		}
	}
        
        public function restriction(){
            
	}
        
        public function confirmation(){
		if ($this->Session->check('Auth.User')){
			$link = array('controller' => 'users', 'action' => 'activate', $this->Session->read('Auth.User.id') . '-' . $this->Session->read('Auth.User.username'));
			$this->send_mail($this->Session->read('Auth.User.email'), $this->Session->read('Auth.User.username'), $this->Session->read('Auth.User.password'), $link);
			$this->redirect('/');
		}
	}
        
        public function send_mail($receiver = null, $name = null, $pass = null, $link = null) {
			App::uses('CakeEmail', 'Network/Email');
			$email = new CakeEmail('gmail');
			$email->from('tp3yannickmercier@gmail.com');
			$email->to($receiver);
			$email->emailFormat('html');
			$email->subject('Mail Confirmation');
			$email->template('signup');
			$email->viewVars(array('username' => $name, 'link' => $link));
			$email->send();
        }
        
        public function activate($token){
		$token = explode('-', $token);
		$userlist = $this->User->find('all');
		$user = $this->User->find('first',array('conditions' => array('id' => $token[0], 'active' => 0)));

		if(!empty($user)){
				$this->User->id = $user['User']['id'];
				$this->User->saveField('active', 1);
				$this->Session->write('Auth.User.active', 1);
				$this->Auth->login($user['User']);
				$this->Auth->logout($user['User']);
			$this->Session->setFlash(__('Your account has been saved, you have now full access'), 'flash/success');
		} else {
			$this->Session->setFlash(__('This activation link is not valid'), 'flash/error');
		}
		$this->redirect('/');
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->User->id = $id;
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
        }
}

