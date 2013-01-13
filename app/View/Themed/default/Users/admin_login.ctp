<div class="page-header">
    <h1><?php echo __('Log In'); ?> <small><?php echo __(''); ?></small></h1>
</div>
<div class="row">
    <div class="span12">
		<?php echo $this->BootstrapForm->create('User', array('action' => 'login', 'class'=>'form-horizontal')); ?>
		<?php echo $this->BootstrapForm->input('username'); ?>
		<?php echo $this->BootstrapForm->input('password'); ?>
		<div class="form-actions">
			<?php echo $this->BootstrapForm->button(__('Log In'),array('class'=>'btn btn-primary')); ?>
			<?php //echo $this->Html->link(__('Forgot your password?'), array('action' => 'forgotpassword'), array('class'=>'btn btn-default')); ?>
		</div>
		<?php echo $this->BootstrapForm->end(); ?>
    </div>
</div>
