<div class="page-header">
	<h1><?php echo __('Locations');?> <small><?php echo __('Add Location'); ?></small></h1>
</div>
<div class="row">
	<div class="span12">
		<?php echo $this->BootstrapForm->create('Location',array('class'=>'form-horizontal'));?>
		<fieldset>
			<legend><?php echo __('Add Location'); ?></legend>
			<?php echo $this->BootstrapForm->input('active'); ?>
			<?php echo $this->BootstrapForm->input('user_id'); ?>
			<?php echo $this->BootstrapForm->input('venue'); ?>
			<?php echo $this->BootstrapForm->input('address'); ?>
			<?php echo $this->BootstrapForm->input('description'); ?>
			<?php echo $this->BootstrapForm->input('latitude'); ?>
			<?php echo $this->BootstrapForm->input('longitude'); ?>
			<?php echo $this->BootstrapForm->input('point'); ?>
			<?php echo $this->BootstrapForm->input('hash'); ?>
			<?php echo $this->BootstrapForm->input('unique_clicks'); ?>
			<?php echo $this->BootstrapForm->input('total_clicks'); ?>
			<?php echo $this->BootstrapForm->input('sms_count'); ?>
			<?php echo $this->BootstrapForm->input('width'); ?>
			<?php echo $this->BootstrapForm->input('height'); ?>
			<?php echo $this->BootstrapForm->input('border'); ?>
			<?php echo $this->BootstrapForm->input('top_bot'); ?>
			<?php echo $this->BootstrapForm->input('refresh_rate'); ?>
			<?php echo $this->BootstrapForm->input('Campaign'); ?>
			<div class="form-actions">
				<?php echo $this->BootstrapForm->button(__('Submit'),array('class'=>'btn btn-primary')); ?>
				<?php echo $this->BootstrapForm->button(__('Cancel'),array('class'=>'btn btn-default')); ?>
			</div>
		</fieldset>
		<?php echo $this->BootstrapForm->end();?>
	</div>
</div>