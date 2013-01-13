<?php
/**
 * @var $this View
 */
?>
<div class="page-header">
	<h1><?php echo __('Roles');?> <small><?php echo __('Add Role'); ?></small></h1>
</div>
<div class="row">
	<div class="span12">
		<?php echo $this->BootstrapForm->create('Role');?>
		<fieldset>
			<legend><?php echo __('Add Role'); ?></legend>
			<?php echo $this->BootstrapForm->input('name'); ?>
			<div class="form-actions">
				<?php echo $this->BootstrapForm->button(__('Submit'),array('class'=>'btn btn-primary')); ?>
			</div>
		</fieldset>
		<?php echo $this->BootstrapForm->end();?>
	</div>
</div>