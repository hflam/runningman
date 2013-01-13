<?php
/**
 * @var $this View
 */
?>
<div class="page-header">
	<?php echo $this->Html->link($this->BootstrapIcon->css('plus','white').' '.__('Add Helper'), array('action' => 'add'), array('class'=>'btn btn-primary btn-small pull-right','escape'=>false)); ?>
	<h1><?php echo __('Helpers');?> <small><?php echo __('List of Helpers');?></small></h1>
</div>
<div class="row">
	<div class="span12">
		<p>
			<?php //echo $this->Filter->filterForm('User', array('legend' => '')); ?>
		</p>
		<table cellpadding="0" cellspacing="0" class="table table-striped">
			<tr>
				<th><?php echo $this->Paginator->sort('role_id');?></th>
				<th><?php echo $this->Paginator->sort('full_name');?></th>
				<th><?php echo $this->Paginator->sort('username');?></th>
				<th><?php echo $this->Paginator->sort('email');?></th>
				<th><?php echo $this->Paginator->sort('is_active',__('Status'));?></th>
				<th><?php echo __('Actions');?></th>
			</tr>
		<?php
		$i = 0;
		foreach ($users as $user): ?>
			<tr>
				<td><span class="label label-info"><?php echo h($user['Role']['name']); ?></span></td>
				<td><?php echo h($user['User']['full_name']); ?></td>
				<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
				<td><?php echo $this->Html->link($user['User']['email'],'mailto:'.$user['User']['email']); ?>&nbsp;</td>
				<td>
				<?php if ($user['User']['is_active']) { ?>
					<span class="label label-success"><?php echo __('ACTIVE'); ?></span>
				<?php } else { ?>
					<span class="label label-important"><?php echo __('INACTIVE'); ?></span>
				<?php } ?>
				</td>
				<td>
					<div class="btn-group">
						<?php echo $this->Html->link($this->BootstrapIcon->css('search','white').' '.__('View'), array('action' => 'view', $user['User']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-primary')); ?>
						<?php echo $this->Html->link($this->BootstrapIcon->css('pencil').' '.__('Edit'), array('action' => 'edit', $user['User']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-default')); ?>
						<?php if ($user['User']['is_active']) { ?>
							<?php echo $this->BootstrapForm->postLink($this->BootstrapIcon->css('remove','white').' '.__('Deactivate'), array('action' => 'deactivate', $user['User']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-danger'), __('Are you sure you want to deactivate # %s?', $user['User']['id'])); ?>
						<?php } else { ?>
							<?php echo $this->BootstrapForm->postLink($this->BootstrapIcon->css('ok','white').' '.__('Activate'), array('action' => 'activate', $user['User']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-success'), __('Are you sure you want to activate # %s?', $user['User']['id'])); ?>
						<?php } ?>
					</div>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
		<p>
		<?php
		echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
		));
		?>
		</p>
		<div class="pagination pagination-centered">
			<ul>
			<?php
				echo $this->Paginator->prev('&larr; '.__('Previous', true), array('tag'=>'li','class'=>'prev', 'escape'=>false), '<a href="#">&larr; '.__('Previous',true).'</a>', array('tag'=>'li','class'=>'prev disabled', 'escape'=>false));
				echo $this->Paginator->numbers(array('tag'=>'li','separator'=>'','disabled'=>'active'));
				echo $this->Paginator->next(__('Next', true).' &rarr;', array('tag'=>'li','class'=>'next','escape'=>false), '<a href="#">'.__('Next',true).' &rarr;</a>', array('tag'=>'li','class' => 'next disabled', 'escape'=>false));
			?>
			</ul>
		</div>
	</div>
</div>