<div class="page-header">
	<h1><?php echo __('Campaigns');?> <small><?php echo __('Edit Campaign'); ?></small></h1>
</div>
<div class="row">
	<div class="span12">
		<?php echo $this->BootstrapForm->create('Campaign',array('class'=>'form-horizontal'));?>
		<fieldset>
			<legend><?php echo __('Edit Campaign'); ?></legend>
			<?php echo $this->BootstrapForm->input('id'); ?>
			<?php echo $this->BootstrapForm->input('business_type_id'); ?>
			<?php echo $this->BootstrapForm->input('name'); ?>
			<?php echo $this->BootstrapForm->input('starttime'); ?>
			<?php echo $this->BootstrapForm->input('endtime'); ?>
			<?php echo $this->BootstrapForm->input('startdate'); ?>
			<?php echo $this->BootstrapForm->input('enddate'); ?>
			<?php echo $this->BootstrapForm->input('ad_text'); ?>
			<?php echo $this->BootstrapForm->input('redirector'); ?>
			<?php echo $this->BootstrapForm->input('auto_charge'); ?>
			<div class="form-actions">
				<?php echo $this->BootstrapForm->button(__('Submit'),array('class'=>'btn btn-primary')); ?>
				<?php echo $this->BootstrapForm->button(__('Cancel'),array('class'=>'btn btn-default')); ?>
			</div>
		</fieldset>
		<?php echo $this->BootstrapForm->end();?>
	</div>
</div>