<div class="page-header">
	<?php //echo $this->Html->link($this->Icon->css('plus','white').' '.__('New Campaign'), array('action' => 'add'), array('class'=>'btn btn-primary btn-small pull-right','escape'=>false)); ?>
    <h1><?php echo __('Campaigns');?> <small><?php echo __('List of Campaigns');?></small></h1>
</div>
<div class="row">
    <div class="span12">
		<p>
			<?php echo $this->Filter->filterForm('Campaign', array()); ?>
		</p>
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tr>
                <th><?php echo $this->Paginator->sort('user_id');?></th>
				<th><?php echo $this->Paginator->sort('business_type_id');?></th>
                <th><?php echo $this->Paginator->sort('name');?></th>
                <th class="span1"><?php echo $this->Paginator->sort('bid');?></th>
                <th class="span1"><?php echo $this->Paginator->sort('budget');?></th>
                <th class="span1"><?php echo $this->Paginator->sort('unique_clicks');?></th>
                <th class="span1"><?php echo $this->Paginator->sort('total_clicks');?></th>
				<th><?php echo $this->Paginator->sort('campaign_source_id');?></th>
				<th class="span1"><?php echo $this->Paginator->sort('active',__('Status'));?></th>
                <th class="span4"><?php echo __('Actions');?></th>
            </tr>
        <?php
        $i = 0;
        foreach ($campaigns as $campaign): ?>
			<tr>
				<td><?php echo $this->Html->link($campaign['User']['username'], array('controller' => 'users', 'action' => 'view', $campaign['User']['id'])); ?></td>
				<td><?php echo $this->Html->link($campaign['BusinessType']['type'], array('controller' => 'business_types', 'action' => 'view', $campaign['BusinessType']['id'])); ?></td>
				<td><?php echo h($campaign['Campaign']['name']); ?>&nbsp;</td>
				<td class="money"><?php echo $this->Number->currency($campaign['Campaign']['bid']); ?>&nbsp;</td>
				<td class="money"><?php echo $this->Number->currency($campaign['Campaign']['budget']); ?>&nbsp;</td>
				<td class="clicks"><?php echo h($campaign['Campaign']['unique_clicks']); ?>&nbsp;</td>
				<td class="clicks"><?php echo h($campaign['Campaign']['total_clicks']); ?>&nbsp;</td>
				<td><?php echo $this->Html->link($campaign['CampaignSource']['name'], array('controller' => 'campaign_sources', 'action' => 'view', $campaign['CampaignSource']['id'])); ?></td>
				<td>
				<?php if ($campaign['Campaign']['is_banned']) { ?>
					<span class="label label-important"><?php echo $this->Icon->css('remove','white'); ?> <?php echo __('Banned'); ?></span>
				<?php } else { ?>
					<?php if ($campaign['Campaign']['active']) { ?>
						<span class="label label-success"><?php echo $this->Icon->css('ok','white'); ?> <?php echo __('Active'); ?></span>
					<?php } else { ?>
						<span class="label label-important"><?php echo $this->Icon->css('remove','white'); ?> <?php echo __('Inactive'); ?></span>
					<?php } ?>
				<?php } ?>
				</td>
				<td>
					<div class="btn-group">
						<?php echo $this->Html->link($this->Icon->css('search','white').' '.__('View'), array('action' => 'view', $campaign['Campaign']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-primary')); ?>
						<?php echo $this->Html->link($this->Icon->css('pencil').' '.__('Edit'), array('action' => 'edit', $campaign['Campaign']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-default')); ?>
						<?php if ($campaign['Campaign']['is_banned']) { ?>
							<?php echo $this->BootstrapForm->postLink($this->Icon->css('remove-sign','white').' '.__('Unban'), array('action' => 'unban', $campaign['Campaign']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-warning'), __('Are you sure you want to unban # %s?', $campaign['Campaign']['id'])); ?>
						<?php } else { ?>
							<?php if ($campaign['Campaign']['active']) { ?>
								<?php echo $this->BootstrapForm->postLink($this->Icon->css('remove-sign','white').' '.__('Deactivate'), array('action' => 'deactivate', $campaign['Campaign']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-danger'), __('Are you sure you want to deactivate # %s?', $campaign['Campaign']['id'])); ?>
							<?php } else { ?>
								<?php echo $this->BootstrapForm->postLink($this->Icon->css('ok-sign','white').' '.__('Activate'), array('action' => 'activate', $campaign['Campaign']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-success'), __('Are you sure you want to activate # %s?', $campaign['Campaign']['id'])); ?>
							<?php } ?>
								<?php echo $this->BootstrapForm->postLink($this->Icon->css('remove-sign','white').' '.__('Ban'), array('action' => 'ban', $campaign['Campaign']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-danger'), __('Are you sure you want to ban # %s?', $campaign['Campaign']['id'])); ?>
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
