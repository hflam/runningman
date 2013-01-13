<div class="page-header">
  <h1><?php echo __('Mi Cuenta');?> <small><?php echo __('Cambiar Contraseña'); ?></small></h1>
</div>
<div class="row">
    <div class="span12">
    	<?php echo $this->BootstrapForm->create('Admin',array('class'=>'form-horizontal'));?>
        <fieldset>
    		<?php echo $this->BootstrapForm->input('current_password',array('type'=>'password','div'=>'control-group','label'=>array('text'=>__('Contraseña Actual'),'class'=>'control-label'),'error'=>array('attributes'=>array('wrap'=>'span','class'=>'help-inline')),'between'=>'<div class="controls">','after'=>'<p class="help-block"></p>')); echo '</div>'; ?>
            <?php echo $this->BootstrapForm->input('new_password',array('type'=>'password','div'=>'control-group','label'=>array('text'=>__('Nueva Contraseña'),'class'=>'control-label'),'error'=>array('attributes'=>array('wrap'=>'span','class'=>'help-inline')),'between'=>'<div class="controls">','after'=>'<p class="help-block"></p>')); echo '</div>'; ?>
            <?php echo $this->BootstrapForm->input('repeat_password',array('type'=>'password','div'=>'control-group','label'=>array('text'=>__('Repetir Contraseña'),'class'=>'control-label'),'error'=>array('attributes'=>array('wrap'=>'span','class'=>'help-inline')),'between'=>'<div class="controls">','after'=>'<p class="help-block"></p>')); echo '</div>'; ?>
        </fieldset>
		<div class="form-actions">
			<?php echo $this->BootstrapForm->button(__('Cambiar'), array('type'=>'submit','class'=>'btn btn-primary')); ?>
			<?php echo $this->BootstrapForm->button(__('Cancelar'), array('type'=>'cancel','class'=>'btn btn-default')); ?>
		</div>
    	<?php echo $this->BootstrapForm->end();?>
    </div>
</div>