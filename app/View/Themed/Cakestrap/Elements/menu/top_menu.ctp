<nav class="navbar navbar-default" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button><!-- /.navbar-toggle -->
		<?php echo $this->Html->Link('Golf tournaments', 'http://localhost/Tp2_YannickMercierV3/tournaments', array('class' => 'navbar-brand')); ?>
	</div><!-- /.navbar-header -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">		
			<li class="active"><a href="#"><?php echo 'Utilisateur : ' . $this->Session->read('Auth.User.username'); ?></a></li>
			<li class="active"><a href="#"><?php echo 'Rôle : ' . $this->Session->read('Auth.User.role'); ?></a></li>
			
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Language <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<?php
					echo $this->I18n->flagSwitcher(array(
						'class' => 'languages',
						'id' => 'language-switcher'
					)); ?>
				</ul>
			</li>
			
			<li><?php echo $this->Html->Link('Register',array('controller' => 'users', 'action' => 'add')); ?></li>
				
				<?php if(!$this->Session->check('Auth.User')) {
						echo '<li>' . $this->Html->Link('Login',array('controller' => 'users', 'action' => 'login')) . '</li>';
							} else {
							echo '<li>' . $this->Html->Link('Logout',array('controller' => 'users', 'action' => 'logout')) . '</li>';
						}
				?>
		</ul><!-- /.nav navbar-nav -->
	</div><!-- /.navbar-collapse -->
</nav><!-- /.navbar navbar-default -->