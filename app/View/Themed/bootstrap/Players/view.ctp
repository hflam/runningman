<?php
/**
 * @var $this View
 */
?>
<div class="page-header">
	<div class="btn-group pull-right">
		<?php echo $this->Html->link($this->BootstrapIcon->css('pencil').' '.__('Edit Player'), array('action' => 'edit', $player['Player']['id']), array('escape'=>false,'class'=>'btn btn-default btn-small')); ?>
		<?php echo $this->Form->postLink($this->BootstrapIcon->css('trash','white').' '.__('Delete Player'), array('action' => 'delete', $player['Player']['id']), array('escape'=>false,'class'=>'btn btn-danger btn-small'), __('Are you sure you want to delete # %s?', $player['Player']['id'])); ?>
		<?php echo $this->Html->link($this->BootstrapIcon->css('list-alt').' '.__('List Players'), array('action' => 'index'), array('escape'=>false,'class'=>'btn btn-default btn-small')); ?>
		<?php echo $this->Html->link($this->BootstrapIcon->css('plus','white').' '.__('New Player'), array('action' => 'add'), array('escape'=>false,'class'=>'btn btn-primary btn-small')); ?>
	</div>
	<h1><?php  echo __('Player');?> <small><?php echo __('Players Details');?></small></h1>
</div>
<div class="row">
	<div class="span12">
		<table class="table">
			<tbody>
				<tr>
					<th class="span4"><?php echo __('Name');?></th>
					<td><?php echo h($player['Player']['name']);?>&nbsp;</td>
				</tr>
				<tr>
					<th class="span4"><?php echo __('Tokens');?></th>
					<td><?php echo h($player['Player']['tokens']);?>&nbsp;</td>
				</tr>
				<tr>
					<th class="span4"><?php echo __('Wmi Key');?></th>
					<td><?php echo h($player['Player']['wmi_key']);?>&nbsp;</td>
				</tr>
			</tbody>
        </table>
    </div>
</div>
