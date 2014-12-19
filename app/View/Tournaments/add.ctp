<?php $this->Html->script('View/Tournament/add', array('inline' => false)); ?>

<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">

		<div class="actions">
		
		<ul class="nav nav-pills nav-stacked">
                    
                    
                    <?php if ($this->Session->check('Auth.User')){ 
				if($this->Session->read('Auth.User.active') == 0){ ?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Confirm your email
						<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							 <li class="list-group-item"><?php echo $this->Html->link(__('Send a new mail confirmation'),
										array('controller' => 'users', 'action' => 'confirmation')); ?>
							 </li>    
								 <li class="list-group-item"><?php echo $this->Html->link(__('Restrictions'),
										array('controller' => 'users', 'action' => 'restriction')); ?>
							 </li>  
						</ul>
						</li>
			<?php }} ?>
                    
		<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Tournament 
		<span class="caret"></span>
		</a>
		<ul class="dropdown-menu">
		<li class="list-group-item"><?php echo $this->Html->link(__('List Tournaments'), array('controller' => 'tournaments', 'action' => 'index'), array('class' => '')); ?> </li>
			<li class="list-group-item"><?php echo $this->Html->link(__('New Tournaments'), array('controller' => 'tournaments', 'action' => 'add'), array('class' => '')); ?> </li>
		</li>              
		</ul>
		</li>
		
		<ul class="nav nav-pills nav-stacked">
		<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Users 
		<span class="caret"></span>
		</a>
		<ul class="dropdown-menu">
			<li class="list-group-item"><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?></li> 
			<li class="list-group-item"><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'), array('class' => '')); ?></li> 
		</li>              
		</ul>
		</li>
		
		<ul class="nav nav-pills nav-stacked">
		<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Golfclub 
		<span class="caret"></span>
		</a>
		<ul class="dropdown-menu">
			<li class="list-group-item"><?php echo $this->Html->link(__('List Golfclubs'), array('controller' => 'golfclubs', 'action' => 'index'), array('class' => '')); ?></li> 
			<li class="list-group-item"><?php echo $this->Html->link(__('New Golfclub'), array('controller' => 'golfclubs', 'action' => 'add'), array('class' => '')); ?></li> 
		</li>              
		</ul>
		</li>
		
		<ul class="nav nav-pills nav-stacked">
		<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Participant 
		<span class="caret"></span>
		</a>
		<ul class="dropdown-menu">
			<li class="list-group-item"><?php echo $this->Html->link(__('List Participants'), array('controller' => 'participants', 'action' => 'index'), array('class' => '')); ?></li> 
			<li class="list-group-item"><?php echo $this->Html->link(__('New Participant'), array('controller' => 'participants', 'action' => 'add'), array('class' => '')); ?></li> 
		</li>              
		</ul>
		</li>
		
		<ul class="nav nav-pills nav-stacked">
		<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Player 
		<span class="caret"></span>
		</a>
		<ul class="dropdown-menu">
			<li class="list-group-item"><?php echo $this->Html->link(__('List Player'), array('controller' => 'players', 'action' => 'index'), array('class' => '')); ?></li> 
			<li class="list-group-item"><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add'), array('class' => '')); ?></li>
		</li>              
		</ul>
		</li>	
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .col-sm-3 -->
	
	<div id="page-content" class="col-sm-9">

		<h2><?php echo __('Add Tournament'); ?></h2>

		<div class="tournaments form">
                    
                    	<?php $uid = $this->Session->read('Auth.User.id');?>
		
			<?php echo $this->Form->create('Tournament', array('type' => 'file')); ?>

				<fieldset>

					<div class="form-group">
						<?php echo $this->Form->input('tournamentsName', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('email', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('file_name',array('type' => 'file')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->hidden('user_id', array('class' => 'form-control', 'default' => $uid)); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('golfclub_id', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('participant_id');?>
					</div><!-- .form-group -->
                                        <div class="form-group">
                                            <?php echo $this->Form->input('country_id'); ?>
                                        </div><!-- .form-group -->
                                        <div class="form-group">
                                            <?php echo $this->Form->input('sponsor_id'); ?>
                                        </div><!-- .form-group -->       
                                        <div class="form-group">
                                            <?php echo $this->Form->input('Cart', array('class' => 'ui-autocomplete', 'id' => 'autocomplete')); ?>
                                        </div><!-- .form-group -->

					<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>

				</fieldset>

			<?php echo $this->Form->end(); ?>
               
		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
<?php
	$this->Js->get('#TournamentCountryId')->event('click', 
	$this->Js->request(array(
	'controller'=>'sponsors',
	'action'=>'getByCountry'
	), array(
	'update'=>'#TournamentSponsorId',
	'async' => true,
	'method' => 'post',
	'dataExpression'=>true,
	'data'=> $this->Js->serializeForm(array(
	'isForm' => true,
	'inline' => true
	))
	))
	);
?>