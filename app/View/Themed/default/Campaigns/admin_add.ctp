<div class="page-header">
	<h1><?php echo __('Campaigns');?> <small><?php echo __('Add Campaign'); ?></small></h1>
</div>
<div class="row">
	<div class="span12">
		<?php echo $this->BootstrapForm->create('Campaign',array('class'=>'form-horizontal'));?>
		<fieldset>
			<legend><?php echo __('Add Campaign'); ?></legend>
			<?php echo $this->BootstrapForm->input('active'); ?>
			<?php echo $this->BootstrapForm->input('user_id'); ?>
			<?php echo $this->BootstrapForm->input('subscription_id'); ?>
			<?php echo $this->BootstrapForm->input('business_type_id'); ?>
			<?php echo $this->BootstrapForm->input('auto_charge'); ?>
			<?php echo $this->BootstrapForm->input('name'); ?>
			<?php echo $this->BootstrapForm->input('bid'); ?>
			<?php echo $this->BootstrapForm->input('budget'); ?>
			<?php echo $this->BootstrapForm->input('running_budget'); ?>
			<?php echo $this->BootstrapForm->input('charged'); ?>
			<?php echo $this->BootstrapForm->input('unique_clicks'); ?>
			<?php echo $this->BootstrapForm->input('total_clicks'); ?>
			<?php echo $this->BootstrapForm->input('sms_count'); ?>
			<?php echo $this->BootstrapForm->input('days'); ?>
			<?php echo $this->BootstrapForm->input('starttime'); ?>
			<?php echo $this->BootstrapForm->input('endtime'); ?>
			<?php echo $this->BootstrapForm->input('startdate'); ?>
			<?php echo $this->BootstrapForm->input('enddate'); ?>
			<?php echo $this->BootstrapForm->input('ad_text'); ?>
			<?php echo $this->BootstrapForm->input('redirector'); ?>
			<?php echo $this->BootstrapForm->input('orig_file_name'); ?>
			<?php echo $this->BootstrapForm->input('polygon'); ?>
			<?php //echo $this->BootstrapForm->input('Location'); ?>
			<div class="form-actions">
				<?php echo $this->BootstrapForm->button(__('Submit'),array('class'=>'btn btn-primary')); ?>
				<?php echo $this->BootstrapForm->button(__('Cancel'),array('class'=>'btn btn-default')); ?>
			</div>
		</fieldset>
		<?php echo $this->BootstrapForm->end();?>
	</div>
</div>