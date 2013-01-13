<div class="page-header">
	<div class="btn-group pull-right">
		<?php echo $this->Html->link($this->Icon->css('pencil').' '.__('Edit Location'), array('action' => 'edit', $location['Location']['id']), array('escape'=>false,'class'=>'btn btn-default btn-small pull-right')); ?>
		<?php if ($location['Location']['active']) { ?>
			<?php echo $this->BootstrapForm->postLink($this->Icon->css('remove-sign','white').' '.__('Deactivate'), array('action' => 'deactivate', $location['Location']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-danger'), __('Are you sure you want to deactivate # %s?', $location['Location']['id'])); ?>
		<?php } else { ?>
			<?php echo $this->BootstrapForm->postLink($this->Icon->css('ok-sign','white').' '.__('Activate'), array('action' => 'activate', $location['Location']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-success'), __('Are you sure you want to activate # %s?', $location['Location']['id'])); ?>
		<?php } ?>
		<?php echo $this->Html->link($this->Icon->css('list-alt').' '.__('List Locations'), array('action' => 'index'), array('escape'=>false,'class'=>'btn btn-default btn-small pull-right')); ?>
		<?php //echo $this->Html->link($this->Icon->css('plus','white').' '.__('New Location'), array('action' => 'add'), array('escape'=>false,'class'=>'btn btn-primary btn-small pull-right')); ?>
	</div>
	<h1><?php  echo __('Location');?> <small><?php echo __('Locations Details');?></small></h1>
</div>
<div class="row">
	<h4><?php echo __('General Information'); ?></h4>
	<div class="span2">
		<dl>
			<dt><?php echo __('Venue');?></dt>
			<dd><?php echo h($location['Location']['venue']);?>&nbsp;</dd>
			<dt><?php echo __('Address');?></dt>
			<dd><?php echo h($location['Location']['address']);?>&nbsp;</dd>
		</dl>
	</div>
	<div class="span2">
		<dl>
			<dt><?php echo __('Description');?></dt>
			<dd><?php echo h($location['Location']['description']);?>&nbsp;</dd>
		</dl>
	</div>
	<div class="span2">
		<dl>
			<dt><?php echo __('User'); ?></dt>
			<dd><?php echo $this->Html->link($location['User']['username'], array('controller' => 'users', 'action' => 'view', $location['User']['id'])); ?>&nbsp;</dd>
		</dl>
	</div>
	<div class="span2">
		<dl>
			<dt><?php echo __('Active');?></dt>
			<dd>
				<?php if ($location['Location']['active']) { ?>
					<?php echo $this->Icon->get('tick'); ?>
				<?php } else { ?>
					<?php echo $this->Icon->get('cross'); ?>
				<?php } ?>
			</dd>
		</dl>
	</div>
	<div class="span2">
		<dl>
			<dt><?php echo __('Created');?></dt>
			<dd><?php echo $this->Time->BootstrapFormat('m/d/Y g:ia', $location['Location']['created']);?>&nbsp;</dd>
		</dl>
	</div>
	<div class="span2">
		<dl>
			<dt><?php echo __('Modified');?></dt>
			<dd><?php echo $this->Time->BootstrapFormat('m/d/Y g:ia', $location['Location']['modified']);?>&nbsp;</dd>
		</dl>
	</div>
</div>
<div class="row">
	<h4><?php echo __('Clicks'); ?></h4>
	<div class="span2">
		<dl>
			<dt><?php echo __('Unique Clicks');?></dt>
			<dd><?php echo h($location['Location']['unique_clicks']);?>&nbsp;</dd>
		</dl>
	</div>
	<div class="span2">
		<dl>
			<dt><?php echo __('Total Clicks');?></dt>
			<dd><?php echo h($location['Location']['total_clicks']);?>&nbsp;</dd>
		</dl>
	</div>
	<div class="span2">
		<dl>
			<dt><?php echo __('Sms Count');?></dt>
			<dd><?php echo h($location['Location']['sms_count']);?>&nbsp;</dd>
		</dl>
	</div>
	<div class="span2">
		<dl>
			<dt><?php echo __('Impressions'); ?></dt>
			<dd><?php echo @$locationImpressionsCount; ?></dd>
		</dl>
	</div>
	<div class="span2">
		<dl>
			<dt><?php echo __('Clicks/Impr.'); ?></dt>
			<dd>
				<?php if (@$locationImpressionsCount) { ?>
				<?php echo $this->Number->toPercentage($location['Location']['total_clicks']/$locationImpressionsCount*100); ?>
				<?php } else { ?>
					0
				<?php } ?>
			</dd>
		</dl>
	</div>
</div>
<div class="row">
	<h4><?php echo __('Ad Display'); ?></h4>
	<div class="span2">
		<dl>
			<dt><?php echo __('Dimensions');?></dt>
			<dd><?php echo h($location['Location']['width']);?>x<?php echo h($location['Location']['height']);?>&nbsp;</dd>
		</dl>
	</div>
	<div class="span2">
		<dl>
			<dt><?php echo __('Border');?></dt>
			<dd><?php echo h($location['Location']['border']);?>&nbsp;</dd>
		</dl>
	</div>
	<div class="span2">
		<dl>
			<dt><?php echo __('Top Bot');?></dt>
			<dd><?php echo h($location['Location']['top_bot']);?>&nbsp;</dd>
		</dl>
	</div>
	<div class="span2">
	</div>
	<div class="span2">
		<dl>
			<dt><?php echo __('Refresh Rate');?></dt>
			<dd><?php echo h($location['Location']['refresh_rate']);?>&nbsp;</dd>
		</dl>
	</div>
</div>
<div class="row">
	<h4><?php echo __('Coordinates'); ?></h4>
	<div class="span3">
		<dl>
			<dt><?php echo __('Latitude');?></dt>
			<dd><?php echo h($location['Location']['latitude']);?>&nbsp;</dd>
        </dl>
    </div>
	<div class="span3">
		<dl>
			<dt><?php echo __('Longitude');?></dt>
			<dd><?php echo h($location['Location']['longitude']);?>&nbsp;</dd>
        </dl>
    </div>
	<div class="span3">
		<dl>
			<dt><?php echo __('Point');?></dt>
			<dd><?php //echo h($location['Location']['point']);?>&nbsp;</dd>
        </dl>
    </div>
</div>
<div class="row">
    <div class="span12" style="display: none;">
		<?php //echo $this->Html->link(__('New Click'), array('controller' => 'clicks', 'action' => 'add'), array('class'=>'btn btn-small btn-primary pull-right'));?>
        <h3><?php echo __('Clicks');?></h3>
        <?php if (!empty($location['Click'])):?>
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tr>
				<th><?php echo __('Bid Charged'); ?></th>
				<th><?php echo __('Ip'); ?></th>
				<th><?php echo __('Agent'); ?></th>
				<th><?php echo __('Bitly'); ?></th>
                <th><?php echo __('Actions');?></th>
            </tr>
			<?php
        $i = 0;
        foreach ($location['Click'] as $click): ?>
			<tr>
				<td><?php echo $click['bid_charged'];?></td>
				<td><?php echo $click['ip'];?></td>
				<td><?php echo $click['agent'];?></td>
				<td><?php echo $click['bitly'];?></td>
				<td>
					<div class="btn-group">
						<?php echo $this->Html->link($this->Icon->css('search','white').' '.__('View'), array('controller' => 'clicks', 'action' => 'view', $click['id']), array('escape'=>false, 'class'=>'btn btn-small btn-primary')); ?>
						<?php echo $this->Html->link($this->Icon->css('pencil').' '.__('Edit'), array('controller' => 'clicks', 'action' => 'edit', $click['id']), array('escape'=>false, 'class'=>'btn btn-small btn-default')); ?>
						<?php echo $this->BootstrapForm->postLink($this->Icon->css('trash','white').' '.__('Delete'), array('controller' => 'clicks', 'action' => 'delete', $click['id']), array('escape'=>false, 'class'=>'btn btn-small btn-danger'), __('Are you sure you want to delete # %s?', $location['Location']['id'])); ?>
					</div>
				</td>
			</tr>
		<?php endforeach; ?>
        </table>
		<?php endif; ?>
    </div>
</div>
<div class="row">
    <div class="span12">
		<?php echo $this->BootstrapForm->postLink($this->Icon->css('ok-sign','white').' '.__('Activate all Locations'), array('controller' => 'campaigns_locations', 'action' => 'activatealllocation', $location['Location']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-success pull-right'), __('Are you sure you want to activate all locations for # %s?', $location['Location']['id'])); ?>
		<?php echo $this->BootstrapForm->postLink($this->Icon->css('remove-sign','white').' '.__('Deactivate all Locations'), array('controller' => 'campaigns_locations', 'action' => 'deactivatealllocation', $location['Location']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-danger pull-right'), __('Are you sure you want to deactivate all locations for # %s?', $location['Location']['id'])); ?>
        <h3><?php echo __('BusinessTypes');?></h3>
        <?php if (!empty($location['BusinessType'])):?>
        <table cellpadding="0" cellspacing="0" class="table table-striped">
			<tr>
				<th><?php echo __('Business Type'); ?></th>
				<th><?php echo __('Allowed'); ?></th>
				<th><?php echo __('Actions');?></th>
			</tr>
			<?php
        $i = 0;
        foreach ($location['BusinessType'] as $businessType): ?>
			<tr>
				<td><?php echo $businessType['type'];?></td>
				<td class="tick">
				<?php if ($businessType['BusinessTypesLocation']['allowed']) { ?>
					<?php echo $this->Icon->get('tick'); ?>
				<?php } else { ?>
					<?php echo $this->Icon->get('cross'); ?>
				<?php } ?>
				</td>
				<td class="actions">
					<div class="btn-group">
						<?php echo $this->Html->link($this->Icon->css('search','white').' '.__('View'), array('controller' => 'campaigns', 'action' => 'view', $businessType['id']), array('escape'=>false, 'class'=>'btn btn-small btn-primary')); ?>
						<?php //echo $this->Html->link($this->Icon->css('pencil').' '.__('Edit'), array('controller' => 'campaigns', 'action' => 'edit', $businessType['id']), array('escape'=>false, 'class'=>'btn btn-small btn-default')); ?>
						<?php if ($businessType['BusinessTypesLocation']['allowed']) { ?>
							<?php echo $this->BootstrapForm->postLink($this->Icon->css('remove-sign','white').' '.__('Disallow'), array('controller'=>'business_types_locations','action' => 'disallow', $businessType['BusinessTypesLocation']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-danger'), __('Are you sure you want to deactivate # %s?', $businessType['BusinessTypesLocation']['id'])); ?>
						<?php } else { ?>
							<?php echo $this->BootstrapForm->postLink($this->Icon->css('ok-sign','white').' '.__('Allow'), array('controller'=>'business_types_locations','action' => 'allow', $businessType['BusinessTypesLocation']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-success'), __('Are you sure you want to activate # %s?', $businessType['BusinessTypesLocation']['id'])); ?>
						<?php } ?>
					</div>
				</td>
			</tr>
			<?php if (!empty($businessType['ChildBusinessType'])) { ?>
				<tr>
					<td colspan="3">
						<table cellpadding="0" id="childbusinesstypes<?php echo $businessType['id']; ?>" cellspacing="0" class="table table-striped childbusinesstype">
							<?php
							$i = 0;
							foreach ($businessType['ChildBusinessType'] as $childBusinessType): ?>
								<tr>
									<td><?php echo $childBusinessType['type'];?></td>
									<td class="tick">
									<?php if ($childBusinessType['Location'][0]['BusinessTypesLocation']['allowed']) { ?>
										<?php echo $this->Icon->get('tick'); ?>
									<?php } else { ?>
											<?php echo $this->Icon->get('cross'); ?>
									<?php } ?>
									</td>
									<td class="actions">
										<div class="btn-group">
											<?php echo $this->Html->link($this->Icon->css('search','white').' '.__('View'), array('controller' => 'campaigns', 'action' => 'view', $childBusinessType['id']), array('escape'=>false, 'class'=>'btn btn-small btn-primary')); ?>
											<?php //echo $this->Html->link($this->Icon->css('pencil').' '.__('Edit'), array('controller' => 'campaigns', 'action' => 'edit', $businessType['id']), array('escape'=>false, 'class'=>'btn btn-small btn-default')); ?>
											<?php if ($childBusinessType['Location'][0]['BusinessTypesLocation']['allowed']) { ?>
												<?php echo $this->BootstrapForm->postLink($this->Icon->css('remove-sign','white').' '.__('Disallow'), array('controller'=>'business_types_locations','action' => 'disallow', $childBusinessType['Location'][0]['BusinessTypesLocation']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-danger'), __('Are you sure you want to deactivate # %s?', $childBusinessType['Location'][0]['BusinessTypesLocation']['id'])); ?>
											<?php } else { ?>
												<?php echo $this->BootstrapForm->postLink($this->Icon->css('ok-sign','white').' '.__('Allow'), array('controller'=>'business_types_locations','action' => 'allow', $childBusinessType['Location'][0]['BusinessTypesLocation']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-success'), __('Are you sure you want to activate # %s?', $childBusinessType['Location'][0]['BusinessTypesLocation']['id'])); ?>
											<?php } ?>
										</div>
									</td>
								</tr>
								<?php endforeach; ?>
						</table>
					</td>
				</tr>
			<?php } ?>
		<?php endforeach; ?>
        </table>
		<?php endif; ?>
    </div>
</div>
<div class="row">
    <div class="span12">
		<?php echo $this->BootstrapForm->postLink($this->Icon->css('ok-sign','white').' '.__('Activate all Locations'), array('controller' => 'campaigns_locations', 'action' => 'activatealllocation', $location['Location']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-success pull-right'), __('Are you sure you want to activate all locations for # %s?', $location['Location']['id'])); ?>
		<?php echo $this->BootstrapForm->postLink($this->Icon->css('remove-sign','white').' '.__('Deactivate all Locations'), array('controller' => 'campaigns_locations', 'action' => 'deactivatealllocation', $location['Location']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-danger pull-right'), __('Are you sure you want to deactivate all locations for # %s?', $location['Location']['id'])); ?>
        <h3><?php echo __('Campaigns');?></h3>
        <?php if (!empty($location['Campaign'])):?>
        <table cellpadding="0" cellspacing="0" class="table table-striped">
			<tr>
				<th class="span8"><?php echo __('Name / Ad Text'); ?></th>
				<th><?php echo __('Unique Clicks'); ?></th>
				<th><?php echo __('Total Clicks'); ?></th>
				<th><?php echo __('User'); ?></th>
				<th style="display: none;"><?php echo __('Starttime'); ?></th>
				<th style="display: none;"><?php echo __('Endtime'); ?></th>
				<th style="display: none;"><?php echo __('Startdate'); ?></th>
				<th style="display: none;"><?php echo __('Enddate'); ?></th>
				<th><?php echo __('Active'); ?></th>
			   <th><?php echo __('Actions');?></th>
			</tr>
			<?php
        $i = 0;
        foreach ($location['Campaign'] as $campaign): ?>
			<tr>
				<td>
					<dl>
						<dt><?php echo $campaign['name'];?></dt>
						<dd><?php echo $campaign['ad_text'];?></dd>
					</dl>
				</td>
				<td class="clicks"><?php echo $campaign['CampaignsLocation']['unique_clicks'];?></td>
				<td class="clicks"><?php echo $campaign['CampaignsLocation']['total_clicks'];?></td>
				<td><?php echo $this->Html->link($campaign['User']['username'],array('controller'=>'users','action'=>'view',$campaign['User']['id']));?></td>
				<td style="display: none;"><?php echo $this->Time->BootstrapFormat('g:ia', $campaign['starttime']);?></td>
				<td style="display: none;"><?php echo $this->Time->BootstrapFormat('g:ia', $campaign['endtime']);?></td>
				<td style="display: none;"><?php echo $this->Time->BootstrapFormat('m/d/Y', $campaign['startdate']);?></td>
				<td style="display: none;"><?php echo $this->Time->BootstrapFormat('m/d/Y', $campaign['enddate']);?></td>
				<td class="tick">
				<?php if ($campaign['CampaignsLocation']['active']) { ?>
					<?php echo $this->Icon->get('tick'); ?>
				<?php } else { ?>
					<?php echo $this->Icon->get('cross'); ?>
				<?php } ?>
				</td>
				<td class="actions">
					<div class="btn-group">
						<?php echo $this->Html->link($this->Icon->css('search','white').' '.__('View'), array('controller' => 'campaigns', 'action' => 'view', $campaign['id']), array('escape'=>false, 'class'=>'btn btn-small btn-primary')); ?>
						<?php //echo $this->Html->link($this->Icon->css('pencil').' '.__('Edit'), array('controller' => 'campaigns', 'action' => 'edit', $campaign['id']), array('escape'=>false, 'class'=>'btn btn-small btn-default')); ?>
						<?php if ($campaign['CampaignsLocation']['active']) { ?>
							<?php echo $this->BootstrapForm->postLink($this->Icon->css('remove-sign','white').' '.__('Deactivate'), array('controller'=>'campaigns_locations','action' => 'deactivate', $campaign['CampaignsLocation']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-danger'), __('Are you sure you want to deactivate # %s?', $campaign['CampaignsLocation']['id'])); ?>
						<?php } else { ?>
							<?php echo $this->BootstrapForm->postLink($this->Icon->css('ok-sign','white').' '.__('Activate'), array('controller'=>'campaigns_locations','action' => 'activate', $campaign['CampaignsLocation']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-success'), __('Are you sure you want to activate # %s?', $campaign['CampaignsLocation']['id'])); ?>
						<?php } ?>
					</div>
				</td>
			</tr>
		<?php endforeach; ?>
        </table>
		<?php endif; ?>
    </div>
</div>
