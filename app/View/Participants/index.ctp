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

		<div class="participants index">
		
			<h2><?php echo __('Participants'); ?></h2>
			
			<div class="table-responsive">
				<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th><?php echo $this->Paginator->sort('playerPlace'); ?></th>
							<th><?php echo $this->Paginator->sort('playerScore'); ?></th>
							<th><?php echo $this->Paginator->sort('player_id'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($participants as $participant): ?>
							<tr>
								<td><?php echo h($participant['Participant']['playerPlace']); ?>&nbsp;</td>
								<td><?php echo h($participant['Participant']['playerScore']); ?>&nbsp;</td>
								<td>
									<?php echo $this->Html->link($participant['Player']['playerName'], array('controller' => 'players', 'action' => 'view', $participant['Player']['id'])); ?>
								</td>
								<td class="actions">
									<?php echo $this->Html->link(__('View'), array('action' => 'view', $participant['Participant']['id']), array('class' => 'btn btn-default btn-xs')); ?>
									<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $participant['Participant']['id']), array('class' => 'btn btn-default btn-xs')); ?>
									<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $participant['Participant']['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $participant['Participant']['id'])); ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->