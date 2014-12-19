<?php
  class Cart extends AppModel {

    public function getCartNames ($term = null) {
      if(!empty($term)) {
        $carts = $this->find('list', array(
          'conditions' => array(
            'name LIKE' => trim($term) . '%'
          )
        ));
        return $carts;
      }
      return false;
    }
  }