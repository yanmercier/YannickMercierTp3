
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">			
						<li class="list-group-item"><?php echo $this->Html->link(__('Edit Participants Tournament'), array('action' => 'edit', $participantsTournament['ParticipantsTournament']['id']), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Participants Tournament'), array('action' => 'delete', $participantsTournament['ParticipantsTournament']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $participantsTournament['ParticipantsTournament']['id'])); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Participants Tournaments'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Participants Tournament'), array('action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="participantsTournaments view">

			<h2><?php  echo __('Participants Tournament'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($participantsTournament['ParticipantsTournament']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Participant Id'); ?></strong></td>
		<td>
			<?php echo h($participantsTournament['ParticipantsTournament']['participant_id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Tournament Id'); ?></strong></td>
		<td>
			<?php echo h($participantsTournament['ParticipantsTournament']['tournament_id']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
