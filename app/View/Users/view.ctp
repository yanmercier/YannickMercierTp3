
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
		
		<div class="users view">
                    
                    <?php $created = $user['User']['created'];?>
                    <?php $modified = $user['User']['modified'];?>

			<h2><?php  echo __('User'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Username'); ?></strong></td>
		<td>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Role'); ?></strong></td>
		<td>
			<?php echo h($user['User']['role']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Email'); ?></strong></td>
		<td>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo is_numeric($created) ? date("Y-m-d H:i:s", $created) : h($created); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo is_numeric($modified) ? date("Y-m-d H:i:s", $created) : h($created); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->
	
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
