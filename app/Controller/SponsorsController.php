<?php
App::uses('AppController', 'Controller');
/**
 * Subcategories Controller
 *
 * @property Subcategory $Subcategory
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SponsorsController extends AppController {

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
		$this->Sponsor->recursive = 0;
		$this->set('sponsors', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Sponsor->exists($id)) {
			throw new NotFoundException(__('Invalid sponsors'));
		}
		$options = array('conditions' => array('Sponsor.' . $this->Sponsor->primaryKey => $id));
		$this->set('sponsors', $this->Sponsor->find('first', $options));
	}
        
        
	public function getByCountry() {
		$country_id = $this->request->data['Tournament']['country_id'];
 
		$sponsors = $this->Sponsor->find('list', array(
		'conditions' => array('Sponsor.country_id' => $country_id),
		'recursive' => -1
		));
 
		$this->set('sponsors',$sponsors);
		$this->layout = 'ajax';
	}
}
