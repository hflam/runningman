<div class="page-header">
	<div class="btn-group pull-right">
		<?php echo $this->Html->link($this->Icon->css('pencil').' '.__('Edit Campaign'), array('action' => 'edit', $campaign['Campaign']['id']), array('escape'=>false,'class'=>'btn btn-default btn-small pull-right')); ?>
		<?php if ($campaign['Campaign']['active']) { ?>
			<?php echo $this->BootstrapForm->postLink($this->Icon->css('remove-sign','white').' '.__('Deactivate'), array('action' => 'deactivate', $campaign['Campaign']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-danger'), __('Are you sure you want to deactivate # %s?', $campaign['Campaign']['id'])); ?>
		<?php } else { ?>
			<?php echo $this->BootstrapForm->postLink($this->Icon->css('ok-sign','white').' '.__('Activate'), array('action' => 'activate', $campaign['Campaign']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-success'), __('Are you sure you want to activate # %s?', $campaign['Campaign']['id'])); ?>
		<?php } ?>
		<?php //echo $this->BootstrapForm->postLink($this->Icon->css('trash','white').' '.__('Delete Campaign'), array('action' => 'delete', $campaign['Campaign']['id']), array('escape'=>false,'class'=>'btn btn-danger btn-small pull-right'), __('Are you sure you want to delete # %s?', $campaign['Campaign']['id'])); ?>
		<?php echo $this->Html->link($this->Icon->css('list-alt').' '.__('List Campaigns'), array('action' => 'index'), array('escape'=>false,'class'=>'btn btn-default btn-small pull-right')); ?>
		<?php echo $this->Html->link($this->Icon->css('plus','white').' '.__('New Campaign'), array('action' => 'add'), array('escape'=>false,'class'=>'btn btn-primary btn-small pull-right')); ?>
	</div>
	<h1><?php  echo __('Campaign');?> <small><?php echo __('Campaigns Details');?></small></h1>
</div>
<div class="row">
	<h4><?php echo __('General Information'); ?></h4>
	<div class="span2">
		<dl>
			<dt><?php echo __('Name');?></dt>
			<dd><?php echo h($campaign['Campaign']['name']);?>&nbsp;</dd>
		</dl>
	</div>
	<div class="span2">
		<dl>
			<dt><?php echo __('Business Type'); ?></dt>
			<dd><?php echo $this->Html->link($campaign['BusinessType']['type'], array('controller' => 'business_types', 'action' => 'view', $campaign['BusinessType']['id'])); ?>&nbsp;</dd>
		</dl>
	</div>
	<div class="span2">
		<dl>
			<dt><?php echo __('User'); ?></dt>
			<dd><?php echo $this->Html->link($campaign['User']['username'], array('controller' => 'users', 'action' => 'view', $campaign['User']['id'])); ?>&nbsp;</dd>
		</dl>
	</div>
	<div class="span2">
		<dl>
			<dt><?php echo __('Active');?></dt>
			<dd>
				<?php if ($campaign['Campaign']['active']) { ?>
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
			<dd><?php echo $this->Time->BootstrapFormat('m/d/Y g:ia', $campaign['Campaign']['created']);?>&nbsp;</dd>
		</dl>
	</div>
	<div class="span2">
		<dl>
			<dt><?php echo __('Modified');?></dt>
			<dd><?php echo $this->Time->BootstrapFormat('m/d/Y g:ia', $campaign['Campaign']['modified']);?>&nbsp;</dd>
		</dl>
	</div>
</div>
<div class="row">
	<div class="span4">
		<dl>
			<dt><?php echo __('Ad Text');?></dt>
			<dd><?php echo h($campaign['Campaign']['ad_text']);?>&nbsp;</dd>
		</dl>
	</div>
	<div class="span2">
		<dl>
			<dt><?php echo __('Redirector');?></dt>
			<dd><?php echo h($campaign['Campaign']['redirector']);?>&nbsp;</dd>
		</dl>
	</div>
	<div class="span2">
		<dl>
			<dt><?php echo __('Starttime');?></dt>
			<dd><?php echo $this->Time->BootstrapFormat('g:ia', $campaign['Campaign']['starttime']);?>&nbsp;</dd>
			<dt><?php echo __('Endtime');?></dt>
			<dd><?php echo $this->Time->BootstrapFormat('g:ia', $campaign['Campaign']['endtime']);?>&nbsp;</dd>
		</dl>
	</div>
	<div class="span2">
		<dl>
			<dt><?php echo __('Startdate');?></dt>
			<dd><?php echo $this->Time->BootstrapFormat('m/d/Y', $campaign['Campaign']['startdate']);?>&nbsp;</dd>
			<dt><?php echo __('Enddate');?></dt>
			<dd><?php echo $this->Time->BootstrapFormat('m/d/Y', $campaign['Campaign']['enddate']);?>&nbsp;</dd>
		</dl>
	</div>
	<div class="span2">
		<dl>
			<dt><?php echo __('Days');?></dt>
			<dd><?php echo h($campaign['Campaign']['days']);?>&nbsp;</dd>
		</dl>
	</div>
</div>
<div class="row">
	<h4><?php echo __('Bidding and Budget'); ?></h4>
	<div class="span2">
		<dl>
			<dt><?php echo __('Bid');?></dt>
			<dd><?php echo $this->Number->currency($campaign['Campaign']['bid']);?>&nbsp;</dd>
		</dl>
	</div>
	<div class="span2">
		<dl>
			<dt><?php echo __('Budget');?></dt>
			<dd><?php echo $this->Number->currency($campaign['Campaign']['budget']);?>&nbsp;</dd>
		</dl>
	</div>
	<div class="span2">
		<dl>
			<dt><?php echo __('Running Budget');?></dt>
			<dd><?php echo $this->Number->currency($campaign['Campaign']['running_budget']);?>&nbsp;</dd>
		</dl>
	</div>
	<div class="span2">
		<dl>
			<dt><?php echo __('Charged');?></dt>
			<dd><?php echo $this->Number->currency($campaign['Campaign']['charged']);?>&nbsp;</dd>
		</dl>
	</div>
	<div class="span2">
		<dl>
			<dt><?php echo __('Auto Charge');?></dt>
			<dd>
				<?php if ($campaign['Campaign']['auto_charge']) { ?>
					<?php echo $this->Icon->get('tick'); ?>
				<?php } else { ?>
					<?php echo $this->Icon->get('cross'); ?>
				<?php } ?>
			</dd>
		</dl>
	</div>
</div>
<div class="row">
	<h4><?php echo __('Clicks'); ?></h4>
	<div class="span2">
		<dl>
			<dt><?php echo __('Unique Clicks');?></dt>
			<dd><?php echo h($campaign['Campaign']['unique_clicks']);?>&nbsp;</dd>
		</dl>
	</div>
	<div class="span2">
		<dl>
			<dt><?php echo __('Total Clicks');?></dt>
			<dd><?php echo h($campaign['Campaign']['total_clicks']);?>&nbsp;</dd>
		</dl>
	</div>
	<div class="span2">
		<dl>
			<dt><?php echo __('Sms Count');?></dt>
			<dd><?php echo h($campaign['Campaign']['sms_count']);?>&nbsp;</dd>
		</dl>
	</div>
	<div class="span2">
		<dl>
			<dt><?php echo __('Impressions'); ?></dt>
			<dd><?php echo @$campaignImpressionsCount; ?></dd>
		</dl>
	</div>
	<div class="span2">
		<dl>
			<dt><?php echo __('Clicks/Impr.'); ?></dt>
			<dd>
				<?php if (@$campaignImpressionsCount) { ?>
					<?php echo $this->Number->toPercentage($campaign['Campaign']['total_clicks']/$campaignImpressionsCount*100); ?>
				<?php } else { ?>
					0
				<?php } ?>
			</dd>
		</dl>
	</div>
</div>
<div class="row" style="display: none;">
    <div class="span12">
		<?php //echo $this->Html->link(__('New Click'), array('controller' => 'clicks', 'action' => 'add'), array('class'=>'btn btn-small btn-primary pull-right'));?>
        <h3><?php echo __('Clicks');?></h3>
        <?php if (!empty($campaign['Click'])):?>
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tr>
				<th><?php echo __('Location Id'); ?></th>
				<th><?php echo __('Bid Charged'); ?></th>
				<th><?php echo __('Ip'); ?></th>
				<th><?php echo __('Agent'); ?></th>
				<th><?php echo __('Bitly'); ?></th>
                <th><?php echo __('Actions');?></th>
            </tr>
			<?php
        $i = 0;
        foreach ($campaign['Click'] as $click): ?>
			<tr>
				<td><?php echo $click['location_id'];?></td>
				<td><?php echo $click['bid_charged'];?></td>
				<td><?php echo $click['ip'];?></td>
				<td><?php echo $click['agent'];?></td>
				<td><?php echo $click['bitly'];?></td>
				<td>
					<div class="btn-group">
						<?php echo $this->Html->link($this->Icon->css('search','white').' '.__('View'), array('controller' => 'clicks', 'action' => 'view', $click['id']), array('escape'=>false, 'class'=>'btn btn-small btn-primary')); ?>
						<?php echo $this->Html->link($this->Icon->css('pencil').' '.__('Edit'), array('controller' => 'clicks', 'action' => 'edit', $click['id']), array('escape'=>false, 'class'=>'btn btn-small btn-default')); ?>
						<?php echo $this->BootstrapForm->postLink($this->Icon->css('trash','white').' '.__('Delete'), array('controller' => 'clicks', 'action' => 'delete', $click['id']), array('escape'=>false, 'class'=>'btn btn-small btn-danger'), __('Are you sure you want to delete # %s?', $campaign['Campaign']['id'])); ?>
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
		<?php echo $this->BootstrapForm->postLink($this->Icon->css('ok-sign','white').' '.__('Activate all Locations'), array('controller' => 'campaigns_locations', 'action' => 'activateallcampaign', $campaign['Campaign']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-success pull-right'), __('Are you sure you want to activate all locations for # %s?', $campaign['Campaign']['id'])); ?>
		<?php echo $this->BootstrapForm->postLink($this->Icon->css('remove-sign','white').' '.__('Deactivate all Locations'), array('controller' => 'campaigns_locations', 'action' => 'deactivateallcampaign', $campaign['Campaign']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-danger pull-right'), __('Are you sure you want to deactivate all locations for # %s?', $campaign['Campaign']['id'])); ?>
        <h3><?php echo __('Campaign Locations');?></h3>
        <?php if (!empty($campaign['Location'])):?>
		<?php //echo $this->BootstrapForm->create('CampaignLocation',array('url'=>'/campaigns_locations/activate_all/'.$campaign['Campaign']['id'])); ?>
		<?php //echo $this->BootstrapForm->hidden('campaign_id',array('value'=>$campaign['Campaign']['id'])); ?>
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tr>
				<th style="display: none;"><input type="checkbox" class="checkall"></th>
				<th><?php echo __('Venue'); ?> / <?php echo __('Address'); ?></th>
				<th><?php echo __('Unique Clicks'); ?></th>
				<th><?php echo __('Total Clicks'); ?></th>
				<th><?php echo __('Relevancy'); ?></th>
				<th><?php echo __('Active'); ?></th>
                <th><?php echo __('Actions');?></th>
            </tr>
			<?php
        $i = 0;
        foreach ($campaign['Location'] as $location): ?>
			<tr>
				<td style="display: none;"><input type="checkbox" id="CampaignsLocation<?php echo $location['CampaignsLocation']['id']; ?>" value="<?php echo $location['CampaignsLocation']['id']; ?>" name="data[CampaignsLocation][]"></td>
				<td>
					<dl>
						<dt><?php echo $location['venue'];?></dt>
						<dd><?php echo $location['address'];?></dd>
					</dl>
				</td>
				<td class="clicks"><?php echo $location['CampaignsLocation']['unique_clicks'];?></td>
				<td class="clicks"><?php echo $location['CampaignsLocation']['total_clicks'];?></td>
				<td class="tick">
					<?php echo $this->Html->image('ajax-loader.gif', array('class'=>'hide ajax-loader-'.$location['CampaignsLocation']['id'])); ?>
					<?php $options = array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9'); ?>
					<?php echo $this->BootstrapForm->select('rev_adj', $options, array('empty'=>false,'class'=>'rev_adj span1','data-campaign_location'=>$location['CampaignsLocation']['id'],'value'=>$location['CampaignsLocation']['rev_adj'])); ?>
					<?php //echo $location['CampaignsLocation']['rev_adj']; ?>
				</td>
				<td class="tick">
				<?php if ($location['CampaignsLocation']['active']) { ?>
					<?php echo $this->Icon->get('tick'); ?>
				<?php } else { ?>
					<?php echo $this->Icon->get('cross'); ?>
				<?php } ?>
				</td>
				<td class="actions">
					<div class="btn-group">
						<?php echo $this->Html->link($this->Icon->css('search','white').' '.__('View'), array('controller' => 'locations', 'action' => 'view', $location['id']), array('escape'=>false, 'class'=>'btn btn-small btn-primary')); ?>
						<?php //echo $this->Html->link($this->Icon->css('pencil').' '.__('Edit'), array('controller' => 'locations', 'action' => 'edit', $location['id']), array('escape'=>false, 'class'=>'btn btn-small btn-default')); ?>
						<?php //echo $this->BootstrapForm->postLink($this->Icon->css('trash','white').' '.__('Delete'), array('controller' => 'locations', 'action' => 'delete', $location['id']), array('escape'=>false, 'class'=>'btn btn-small btn-danger'), __('Are you sure you want to delete # %s?', $campaign['Campaign']['id'])); ?>
						<?php if ($location['CampaignsLocation']['active']) { ?>
							<?php echo $this->BootstrapForm->postLink($this->Icon->css('remove-sign','white').' '.__('Deactivate'), array('controller' => 'campaigns_locations', 'action' => 'deactivate', $location['CampaignsLocation']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-danger'), __('Are you sure you want to deactivate # %s?', $location['CampaignsLocation']['id'])); ?>
						<?php } else { ?>
							<?php echo $this->BootstrapForm->postLink($this->Icon->css('ok-sign','white').' '.__('Activate'), array('controller' => 'campaigns_locations', 'action' => 'activate', $location['CampaignsLocation']['id']), array('escape'=>false, 'class'=>'btn btn-small btn-success'), __('Are you sure you want to activate # %s?', $location['CampaignsLocation']['id'])); ?>
						<?php } ?>
					</div>
				</td>
			</tr>
		<?php endforeach; ?>
        </table>
		<script type="text/javascript">
		$(function () { // this line makes sure this code runs on page load
			$('.checkall').click(function () {
				$(this).parents('table:eq(0)').find(':checkbox').attr('checked', this.checked);
			});
		});
		</script>
		<?php //echo $this->BootstrapForm->end(__('Submit'));?>
		<?php endif; ?>
    </div>
</div>
