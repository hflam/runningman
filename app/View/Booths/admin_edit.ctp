<?php
/**
 * @var $this View
 */
?>
<div class="page-header">
	<?php echo $this->Html->link($this->BootstrapIcon->css('list-alt','black').' '.__('List Booth'), array('action' => 'index'), array('class'=>'btn btn-default btn-small pull-right','escape'=>false)); ?>
    <h1><?php echo __('Booths');?> <small><?php echo __('Admin Edit %s', __('Booth')); ?></small></h1>
</div>
<div class="row">
    <div class="span12">
		<?php echo $this->BootstrapForm->create('Booth', array('class' => 'form-horizontal'));?>
			<fieldset>
				<?php
					echo $this->BootstrapForm->hidden('id');
					echo $this->BootstrapForm->input('location');
					echo $this->BootstrapForm->input('note');
				?>
				<?php echo $this->BootstrapForm->submit(__('Submit'), array('class'=>'btn btn-primary'));?>
			</fieldset>
		<?php echo $this->BootstrapForm->end();?>
	</div>
</div>