<?php
  //let's load jquery libs from google
  $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', array('inline' => false));
  $this->Html->script('https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js', array('inline' => false));

  //load file for this view to work on 'autocomplete' field
  $this->Html->script('View/Carts/index', array('inline' => false));

  //form with autocomplete class field
  echo $this->Form->create();
  echo $this->Form->input('name', array('class' => 'ui-autocomplete',
               'id' => 'autocomplete'));
  echo $this->Form->end();