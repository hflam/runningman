<?php if ($this->Session->read('Auth.User.id')) { ?>
	<p class="navbar-text pull-right">
		<?php echo __('Logged in as'); ?> <?php echo $this->Html->link($this->Session->read('Auth.User.username'), array('plugin'=>false,'controller'=>'users','action'=>'profile','admin'=>true)); ?> |
        <?php echo $this->Html->link(__('Logout'), array('plugin'=>false,'controller'=>'users','action'=>'logout','admin'=>true)); ?>
	</p>
<?php } else { ?>
	<?php
    echo $this->BootstrapForm->create('User', array(
		'url' => array('controller'=>'users','action'=>'login','admin'=>true),
		'inputDefaults' => array('label'=>false,'div'=>false),
		'class' => 'pull-right form-search login-form'
	));
	?>
	<?php echo $this->BootstrapForm->input('username',array('class'=>'input-small','placeholder'=>__('Username'))); ?>
	<?php echo $this->BootstrapForm->input('password',array('class'=>'input-small','placeholder'=>__('Password'))); ?>
	<?php echo $this->BootstrapForm->button(__('Sign In'),array('class'=>'btn')); ?>
<?php echo $this->BootstrapForm->end(); ?>
<?php } ?>