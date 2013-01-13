<?php
/**
 * @var $this View
 */
?>
<div class="page-header">
	<?php echo $this->Html->link($this->BootstrapIcon->css('list-alt','black').' '.__('List Player'), array('action' => 'index'), array('class'=>'btn btn-default btn-small pull-right','escape'=>false)); ?>
    <h1><?php echo __('Players');?> <small><?php echo __('Edit %s', __('Player')); ?></small></h1>
</div>
<div class="row">
    <div class="span12">
		<?php echo $this->BootstrapForm->create('Player', array('class' => 'form-horizontal'));?>
			<fieldset>
				<?php
					echo $this->BootstrapForm->hidden('id');
					echo $this->BootstrapForm->input('name', array(
						'required' => 'required',
						'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;')
					);
					echo $this->BootstrapForm->input('tokens', array(
						'required' => 'required',
						'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;')
					);
					echo $this->BootstrapForm->input('wmi_key');
				?>
				<?php echo $this->BootstrapForm->submit(__('Submit'), array('class'=>'btn btn-primary'));?>
			</fieldset>
		<?php echo $this->BootstrapForm->end();?>
	</div>
</div>