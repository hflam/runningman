<?php
/**
 * @var $this View
 */
?>
<div class="page-header">
  <h1><?php  echo __('My Account');?> <small><?php echo __('Profile');?></small></h1>
</div>
<div class="row">
    <div class="span12">
        <dl>
			<dt><?php echo __('Full Name'); ?></dt>
			<dd><?php echo h($user['User']['full_name']); ?>&nbsp;</dd>
			<dt><?php echo __('Username'); ?></dt>
			<dd><?php echo h($user['User']['username']); ?>&nbsp;</dd>
			<dt><?php echo __('Email'); ?></dt>
			<dd><?php echo $this->Html->link($user['User']['email'],'mailto:'.$user['User']['email']); ?>&nbsp;</dd>
			<dt><?php echo __('Role'); ?></dt>
   			<dd><span class="label label-info"><?php echo $user['Role']['name']; ?></span></dd>
        </dl>
    </div>
	<br clear="all" />
	<div class="form-actions">
		<?php echo $this->Html->link(__('Change Password'), array('action' => 'changepassword'), array('class'=>'btn default')); ?>
	</div>
</div>