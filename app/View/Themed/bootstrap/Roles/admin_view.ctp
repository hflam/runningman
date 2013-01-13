<?php
/**
 * @var $this View
 */
?>
<div class="page-header">
	<div class="btn-group pull-right">
		<?php //echo $this->Html->link($this->BootstrapIcon->css('pencil').' '.__('Edit Role'), array('action' => 'edit', $role['Role']['id']), array('escape'=>false,'class'=>'btn btn-default btn-small pull-right')); ?>
		<?php //echo $this->BootstrapForm->postLink($this->BootstrapIcon->css('trash','white').' '.__('Eliminar Role'), array('action' => 'delete', $role['Role']['id']), array('escape'=>false,'class'=>'btn btn-danger btn-small pull-right'), __('Are you sure you want to delete # %s?', $role['Role']['id'])); ?>
		<?php echo $this->Html->link($this->BootstrapIcon->css('list-alt').' '.__('List Roles'), array('action' => 'index'), array('escape'=>false,'class'=>'btn btn-default btn-small pull-right')); ?>
		<?php //echo $this->Html->link($this->BootstrapIcon->css('plus','white').' '.__('Add Role'), array('action' => 'add'), array('escape'=>false,'class'=>'btn btn-primary btn-small pull-right')); ?>
	</div>
	<h1><?php  echo __('Role');?> <small><?php echo __('Roles details');?></small></h1>
</div>
<div class="row">
	<div class="span12">
		<dl>
			<dt><?php echo __('Name');?></dt>
			<dd><?php echo h($role['Role']['name']);?>&nbsp;</dd>
		</dl>
	</div>
</div>
<div class="row">
	<div class="span12">
		<?php echo $this->Html->link($this->BootstrapIcon->css('plus','white').' '.__('Add User'), array('controller' => 'users', 'action' => 'add', $role['Role']['id']), array('class'=>'btn btn-small btn-primary pull-right','escape'=>false));?>
		<h3><?php echo __('Users');?></h3>
		<?php if (!empty($role['User'])):?>
		<table cellpadding="0" cellspacing="0" class="table table-striped">
			<tr>
				<th><?php echo __('Full Name'); ?></th>
				<th><?php echo __('Username'); ?></th>
				<th><?php echo __('Email'); ?></th>
				<th><?php echo __('Status'); ?></th>
				<th><?php echo __('Actions');?></th>
			</tr>
			<?php
		$i = 0;
		foreach ($role['User'] as $user): ?>
			<tr>
				<td><?php echo $user['full_name'];?></td>
				<td><?php echo $user['username'];?></td>
				<td><?php echo $this->Html->link($user['email'],'mailto:'.$user['email']);?></td>
                <td>
                    <?php if ($user['is_active']) { ?>
                    <span class="label label-success"><?php echo __('ACTIVE'); ?></span>
                    <?php } else { ?>
                    <span class="label label-important"><?php echo __('INACTIVE'); ?></span>
                    <?php } ?>
                </td>
				<td>
					<div class="btn-group">
						<?php echo $this->Html->link($this->BootstrapIcon->css('search','white').' '.__('View'), array('controller' => 'users', 'action' => 'view', $user['id']), array('escape'=>false, 'class'=>'btn btn-small btn-primary')); ?>
						<?php echo $this->Html->link($this->BootstrapIcon->css('pencil').' '.__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id']), array('escape'=>false, 'class'=>'btn btn-small btn-default')); ?>
                        <?php if ($user['is_active']) { ?>
                        <?php echo $this->BootstrapForm->postLink($this->BootstrapIcon->css('remove','white').' '.__('Deactivate'), array('action' => 'deactivate', $user['id']), array('escape'=>false, 'class'=>'btn btn-small btn-danger'), __('Are you sure you want to deactivate # %s?', $user['id'])); ?>
                        <?php } else { ?>
                        <?php echo $this->BootstrapForm->postLink($this->BootstrapIcon->css('ok','white').' '.__('Activate'), array('action' => 'activate', $user['id']), array('escape'=>false, 'class'=>'btn btn-small btn-success'), __('Are you sure you want to activate # %s?', $user['id'])); ?>
                        <?php } ?>
					</div>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
		<?php endif; ?>
	</div>
</div>
