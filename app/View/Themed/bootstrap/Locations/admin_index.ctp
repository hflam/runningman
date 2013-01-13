<div class="page-header">
	<?php //echo $this->Html->link($this->Icon->css('plus','white').' '.__('New Location'), array('action' => 'add'), array('class'=>'btn btn-primary btn-small pull-right','escape'=>false)); ?>
    <h1><?php echo __('Locations');?> <small><?php echo __('List of Locations');?></small></h1>
</div>
<div class="row">
    <div class="span12">
		<p>
			<?php echo $this->Filter->filterForm('Location', array()); ?>
		</p>
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tr>
                <th><?php echo $this->Paginator->sort('user_id');?></th>
                <th><?php echo $this->Paginator->sort('venue');?></th>
                <th><?php echo $this->Paginator->sort('address');?></th>
                <th><?php echo $this->Paginator->sort('unique_clicks');?></th>
                <th><?php echo $this->Paginator->sort('total_clicks');?></th>
				<th><?php echo $this->Paginator->sort('active');?></th>
                <th><?php echo __('Actions');?></th>
            </tr>
        <?php
        $i = 0;
        foreach ($locations as $location): ?>
			<tr>
				<td><?php echo $this->Html->link($location['User']['username'], array('controller' => 'users', 'action' => 'view', $location['User']['id'])); ?></td>
				<td><?php echo h($location['Location']['venue']); ?>&nbsp;</td>
				<td><?php echo h($location['Location']['address']); ?>&nbsp;</td>
				<td><?php echo h($location['Location']['unique_clicks']); ?>&nbsp;</td>
				<td><?php echo h($location['Location']['total_clicks']); ?>&nbsp;</td>
				<td>
				<?php if ($location['Location']['active']) { ?>
					<?php echo $this->Icon->get('tick'); ?>
				<?php } else { ?>
					<?php echo $this->Icon->get('cross'); ?>
				<?php } ?>
				</td>
				<td>
					<div class="btn-group">
						<?php echo $this->Html->link($this->Icon->css('search','white').' '.__('View'), array('action' => 'view', $location['Location']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-primary')); ?>
						<?php echo $this->Html->link($this->Icon->css('pencil').' '.__('Edit'), array('action' => 'edit', $location['Location']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-default')); ?>
						<?php if ($location['Location']['active']) { ?>
							<?php echo $this->BootstrapForm->postLink($this->Icon->css('remove-sign','white').' '.__('Deactivate'), array('action' => 'deactivate', $location['Location']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-danger'), __('Are you sure you want to deactivate # %s?', $location['Location']['id'])); ?>
						<?php } else { ?>
							<?php echo $this->BootstrapForm->postLink($this->Icon->css('ok-sign','white').' '.__('Activate'), array('action' => 'activate', $location['Location']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-success'), __('Are you sure you want to activate # %s?', $location['Location']['id'])); ?>
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