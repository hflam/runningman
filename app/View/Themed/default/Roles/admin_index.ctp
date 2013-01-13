<?php
/**
 * @var $this View
 */
?>
<div class="page-header">
	<?php echo $this->Html->link($this->BootstrapIcon->css('plus','white').' '.__('Add Role'), array('action' => 'add'), array('class'=>'btn btn-primary btn-small pull-right','escape'=>false)); ?>
    <h1><?php echo __('Roles');?> <small><?php echo __('List of Roles');?></small></h1>
</div>
<div class="row">
	<div class="span12">
		<table cellpadding="0" cellspacing="0" class="table table-striped">
			<tr>
				<th><?php echo $this->Paginator->sort('name');?></th>
				<th class="span2"><?php echo __('Opciones');?></th>
			</tr>
		<?php
		$i = 0;
		foreach ($roles as $role): ?>
			<tr>
				<td><?php echo h($role['Role']['name']); ?>&nbsp;</td>
				<td>
					<div class="btn-group">
						<?php echo $this->Html->link($this->BootstrapIcon->css('search','white').' '.__('View'), array('action' => 'view', $role['Role']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-primary')); ?>
						<?php //echo $this->Html->link($this->BootstrapIcon->css('pencil').' '.__('Edit'), array('action' => 'edit', $role['Role']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-default')); ?>
						<?php //echo $this->BootstrapForm->postLink($this->BootstrapIcon->css('trash','white').' '.__('Eliminar'), array('action' => 'delete', $role['Role']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-danger'), __('Are you sure you want to delete # %s?', $role['Role']['id'])); ?>
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