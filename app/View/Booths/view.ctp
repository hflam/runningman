<?php
/**
 * @var $this View
 */
?>
<div class="page-header">
	<div class="btn-group pull-right">
		<?php echo $this->Html->link($this->BootstrapIcon->css('pencil').' '.__('Edit Booth'), array('action' => 'edit', $booth['Booth']['id']), array('escape'=>false,'class'=>'btn btn-default btn-small')); ?>
		<?php echo $this->Form->postLink($this->BootstrapIcon->css('trash','white').' '.__('Delete Booth'), array('action' => 'delete', $booth['Booth']['id']), array('escape'=>false,'class'=>'btn btn-danger btn-small'), __('Are you sure you want to delete # %s?', $booth['Booth']['id'])); ?>
		<?php echo $this->Html->link($this->BootstrapIcon->css('list-alt').' '.__('List Booths'), array('action' => 'index'), array('escape'=>false,'class'=>'btn btn-default btn-small')); ?>
		<?php echo $this->Html->link($this->BootstrapIcon->css('plus','white').' '.__('New Booth'), array('action' => 'add'), array('escape'=>false,'class'=>'btn btn-primary btn-small')); ?>
	</div>
	<h1><?php  echo __('Booth');?> <small><?php echo __('Booths Details');?></small></h1>
</div>
<div class="row">
	<div class="span12">
		<table class="table">
			<tbody>
				<tr>
					<th class="span4"><?php echo __('Location');?></th>
					<td><?php echo h($booth['Booth']['location']);?>&nbsp;</td>
				</tr>
				<tr>
					<th class="span4"><?php echo __('Note');?></th>
					<td><?php echo h($booth['Booth']['note']);?>&nbsp;</td>
				</tr>
			</tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="span12">
		<?php echo $this->Html->link($this->BootstrapIcon->css('plus','white').' '.__('New User'), array('controller' => 'users', 'action' => 'add'), array('class'=>'btn btn-small btn-primary pull-right','escape'=>false));?>
        <h3><?php echo __('Users');?></h3>
        <?php if (!empty($booth['User'])):?>
        <table cellpatding="0" cellspacing="0" class="table table-striped">
            <tr>
				<th><?php echo __('Role Id'); ?></th>
				<th><?php echo __('Name'); ?></th>
				<th><?php echo __('Lastname'); ?></th>
				<th><?php echo __('Username'); ?></th>
				<th><?php echo __('New Password Requested'); ?></th>
				<th><?php echo __('New Password Hash'); ?></th>
				<th><?php echo __('Email'); ?></th>
				<th><?php echo __('Is Active'); ?></th>
				<th><?php echo __('Is Confirmed'); ?></th>
                <th class="span3"><?php echo __('Actions');?></th>
            </tr>
			<?php
        $i = 0;
        foreach ($booth['User'] as $user): ?>
			<tr>
				<td><?php echo $user['role_id'];?></td>
				<td><?php echo $user['name'];?></td>
				<td><?php echo $user['lastname'];?></td>
				<td><?php echo $user['username'];?></td>
				<td><?php echo $user['new_password_requested'];?></td>
				<td><?php echo $user['new_password_hash'];?></td>
				<td><?php echo $user['email'];?></td>
				<td>
				<?php if ($booth['Booth']['is_active']) { ?>
					<span class="label label-success"><?php echo __('ACTIVE'); ?></span>
				<?php } else { ?>
					<span class="label label-important"><?php echo __('INACTIVE'); ?></span>
				<?php } ?>
				</td>
				<td>
				<?php if ($booth['Booth']['is_confirmed']) { ?>
					<span class="label label-success"><?php echo __('YES'); ?></span>
				<?php } else { ?>
					<span class="label label-important"><?php echo __('NO'); ?></span>
				<?php } ?>
				</td>
				<td>
					<div class="btn-group">
						<?php echo $this->Html->link($this->BootstrapIcon->css('search','white').' '.__('View'), array('controller' => 'users', 'action' => 'view', $user['id']), array('escape'=>false, 'class'=>'btn btn-small btn-primary')); ?>
						<?php echo $this->Html->link($this->BootstrapIcon->css('pencil').' '.__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id']), array('escape'=>false, 'class'=>'btn btn-small btn-default')); ?>
						<?php echo $this->Form->postLink($this->BootstrapIcon->css('trash','white').' '.__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), array('escape'=>false, 'class'=>'btn btn-small btn-danger'), __('Are you sure you want to delete # %s?', $user['id'])); ?>
					</div>
				</td>
			</tr>
		<?php endforeach; ?>
        </table>
		<?php endif; ?>
    </div>
</div>
