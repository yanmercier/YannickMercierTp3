<p>
	<strong>Hello <?php echo $username; ?></strong>
<p>

<p>To activate your account, click on this link : </p>
<p> <?php echo $this->Html->link('Activate your account', $this->Html->url($link,true)); ?></p>



