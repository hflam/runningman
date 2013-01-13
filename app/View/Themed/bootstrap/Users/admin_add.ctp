<div class="page-header">
	<h1><?php echo __('Helpers');?> <small><?php echo __('Add Helper'); ?></small></h1>
</div>
<div class="row">
	<div class="span12">
		<?php echo $this->BootstrapForm->create('User',array('class'=>'form-horizontal'));?>
		<fieldset>
			<legend><?php echo __('Personal Information'); ?></legend>
            <?php echo $this->BootstrapForm->input('name'); ?>
            <?php echo $this->BootstrapForm->input('lastname'); ?>
            <?php echo $this->BootstrapForm->input('email'); ?>
            <legend><?php echo __('Account Information'); ?></legend>
            <?php echo $this->BootstrapForm->input('role_id', array('empty'=>'')); ?>
            <?php echo $this->BootstrapForm->input('booth_id', array('empty'=>'', 'label' => 'Assigned Booth')); ?>
            <?php echo $this->BootstrapForm->input('username'); ?>
			<?php echo $this->BootstrapForm->input('password'); ?>
			<?php echo $this->BootstrapForm->input('is_active'); ?>
			<div class="form-actions">
				<?php echo $this->BootstrapForm->button(__('Submit'),array('class'=>'btn btn-primary')); ?>
			</div>
		</fieldset>
		<?php echo $this->BootstrapForm->end();?>
	</div>
</div>