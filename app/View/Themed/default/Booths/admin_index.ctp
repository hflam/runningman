<?php
/**
 * @var $this View
 */
?>
<div class="page-header">
	<?php echo $this->Html->link($this->BootstrapIcon->css('plus','white').' '.__('New Booth'), array('action' => 'add'), array('class'=>'btn btn-primary btn-small pull-right','escape'=>false)); ?>
    <h1><?php echo __('Booths');?> <small><?php echo __('List of Booths');?></small></h1>
</div>
<div class="row">
    <div class="span12">
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tr>
                <th><?php echo $this->Paginator->sort('location');?></th>
                <th><?php echo $this->Paginator->sort('note');?></th>
                <th class="span3"><?php echo __('Actions');?></th>
            </tr>
			<?php foreach ($booths as $booth) { ?>
			<tr>
				<td><?php echo h($booth['Booth']['location']); ?>&nbsp;</td>
				<td><?php echo h($booth['Booth']['note']); ?>&nbsp;</td>
				<td>
					<div class="btn-group">
						<?php echo $this->Html->link($this->BootstrapIcon->css('search','white').' '.__('View'), array('action' => 'view', $booth['Booth']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-primary')); ?>
						<?php echo $this->Html->link($this->BootstrapIcon->css('pencil').' '.__('Edit'), array('action' => 'edit', $booth['Booth']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-default')); ?>
						<?php echo $this->Form->postLink($this->BootstrapIcon->css('trash','white').' '.__('Delete'), array('action' => 'delete', $booth['Booth']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-danger'), __('Are you sure you want to delete # %s?', $booth['Booth']['id'])); ?>
					</div>
				</td>
			</tr>
			<?php } ?>
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