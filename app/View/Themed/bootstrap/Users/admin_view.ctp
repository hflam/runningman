<?php
/**
 * @var $this View
 */
?>
<div class="page-header">
	<div class="btn-group pull-right">
		<?php echo $this->Html->link($this->Icon->css('pencil').' '.__('Edit User'), array('action' => 'edit', $user['User']['id']), array('escape'=>false,'class'=>'btn btn-default btn-small pull-right')); ?>
		<?php echo $this->Form->postLink($this->Icon->css('trash','white').' '.__('Delete User'), array('action' => 'delete', $user['User']['id']), array('escape'=>false,'class'=>'btn btn-danger btn-small pull-right'), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
		<?php echo $this->Html->link($this->Icon->css('list-alt').' '.__('List Users'), array('action' => 'index'), array('escape'=>false,'class'=>'btn btn-default btn-small pull-right')); ?>
		<?php echo $this->Html->link($this->Icon->css('plus','white').' '.__('New User'), array('action' => 'add'), array('escape'=>false,'class'=>'btn btn-primary btn-small pull-right')); ?>
	</div>
	<h1><?php  echo __('User');?> <small><?php echo __('Users Details');?></small></h1>
</div>
<div class="row">
	<div class="span12">
		<dl>
			<dt><?php echo __('Role'); ?></dt>
			<dd><?php echo $this->Html->link($user['Role']['name'], array('controller' => 'roles', 'action' => 'view', $user['Role']['id'])); ?>&nbsp;</dd>
			<dt><?php echo __('Name');?></dt>
			<dd><?php echo h($user['User']['name']);?>&nbsp;</dd>
			<dt><?php echo __('Lastname');?></dt>
			<dd><?php echo h($user['User']['lastname']);?>&nbsp;</dd>
			<dt><?php echo __('Username');?></dt>
			<dd><?php echo h($user['User']['username']);?>&nbsp;</dd>
			<dt><?php echo __('Email');?></dt>
			<dd><?php echo h($user['User']['email']);?>&nbsp;</dd>
			<dt><?php echo __('Active');?></dt>
			<dd>
				<?php if ($user['User']['is_active']) { ?>
					<?php echo $this->Icon->get('tick'); ?>
				<?php } else { ?>
					<?php echo $this->Icon->get('cross'); ?>
				<?php } ?>
			</dd>
			<dt><?php echo __('Created');?></dt>
			<dd><?php echo $this->Time->format('m/d/Y g:ia', $user['User']['created']);?>&nbsp;</dd>
			<dt><?php echo __('Modified');?></dt>
			<dd><?php echo $this->Time->format('m/d/Y g:ia', $user['User']['modified']);?>&nbsp;</dd>
        </dl>
    </div>
</div>
