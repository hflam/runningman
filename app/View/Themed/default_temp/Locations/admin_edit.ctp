<div class="page-header">
	<h1><?php echo __('Locations');?> <small><?php echo __('Edit Location'); ?></small></h1>
</div>
<div class="row">
	<div class="span12">
		<?php echo $this->BootstrapForm->create('Location',array('class'=>'form-horizontal'));?>
		<fieldset>
			<legend><?php echo __('Edit Location'); ?></legend>
			<?php echo $this->BootstrapForm->input('id'); ?>
			<?php echo $this->BootstrapForm->input('venue'); ?>
			<?php echo $this->BootstrapForm->input('address'); ?>
			<?php echo $this->BootstrapForm->input('description'); ?>
			<?php echo $this->BootstrapForm->input('width'); ?>
			<?php echo $this->BootstrapForm->input('height'); ?>
			<?php echo $this->BootstrapForm->input('border'); ?>
			<?php echo $this->BootstrapForm->input('top_bot'); ?>
			<?php echo $this->BootstrapForm->input('refresh_rate'); ?>
			<?php //echo $this->BootstrapForm->input('Campaign',array('multiple'=>'checkbox')); ?>
			<div class="form-actions">
				<?php echo $this->BootstrapForm->button(__('Submit'),array('class'=>'btn btn-primary')); ?>
				<?php echo $this->BootstrapForm->button(__('Cancel'),array('class'=>'btn btn-default')); ?>
			</div>
		</fieldset>
		<?php echo $this->BootstrapForm->end();?>
	</div>
</div>