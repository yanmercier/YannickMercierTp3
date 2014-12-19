<?php
  class CartsController extends AppController {

    public $layout = 'basic';
    
    public $components = array('RequestHandler');

    public function index() {
        if ($this->request->is('ajax')) {
           $term = $this->request->query('term');
           $cartNames = $this->Cart->getCartNames($term);
           $this->set(compact('cartNames'));
           $this->set('_serialize', 'cartNames');
        } else {
            $term = $this->request->query('term');
            $cartNames = $this->Cart->getCartNames($term);
            $this->set(compact('cartNames'));
            $this->set('_serialize', 'cartNames');
        }
    }
    
     public function get_Carts_Names() {
        if ($this->request->is('ajax')) {
            $term = $this->request->query('term');
            $cartNames = $this->Cart->getCartNames($term);
            $this->set(compact('cartNames'));
            $this->set('_serialize', 'cartNames');
        }
    }
  }
  
  