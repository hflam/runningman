<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<div class="page-header">
	<h1><?php echo "<?php echo __('{$pluralHumanName}');?>";?> <small><?php printf("<?php echo __('%s %s'); ?>", Inflector::humanize(str_replace('admin_','',$action)), $singularHumanName); ?></small></h1>
</div>
<div class="row">
	<div class="span12">
<?php echo "\t\t<?php echo \$this->Form->create('{$modelClass}',array('class'=>'form-horizontal'));?>\n";?>
		<fieldset>
			<legend><?php printf("<?php echo __('%s %s'); ?>", Inflector::humanize(str_replace('admin_','',$action)), $singularHumanName); ?></legend>
<?php
            foreach ($fields as $field) {
                if (strpos($action, 'add') !== false && $field == $primaryKey) {
                    continue;
				} else if (substr($field,strlen($field)-3,3)=="_id") {
					if (strpos($action, 'add') == true) {
						echo "\t\t\t<?php echo \$this->Form->input('{$field}',array('empty'=>'','div'=>'control-group','label'=>array('class'=>'control-label'),'error'=>array('attributes'=>array('wrap'=>'span','class'=>'help-inline')),'between'=>'<div class=\"controls\">','after'=>'<p class=\"help-block\"></p>')); echo '</div>'; ?>\n";
					} else {
						echo "\t\t\t<?php echo \$this->Form->input('{$field}',array('div'=>'control-group','label'=>array('class'=>'control-label'),'error'=>array('attributes'=>array('wrap'=>'span','class'=>'help-inline')),'between'=>'<div class=\"controls\">','after'=>'<p class=\"help-block\"></p>')); echo '</div>'; ?>\n";
					}
				} else if (substr($field,0,3)=="is_") {
					echo "\t\t\t<?php echo \$this->Form->input('{$field}',array('div'=>'control-group','label'=>array('text'=>'','class'=>'control-label'),'error'=>array('attributes'=>array('wrap'=>'span','class'=>'help-inline')),'before'=>'<label for=\"".Inflector::camelize($singularHumanName.'_'.$field)."\" class=\"control-label\">'.__('".Inflector::humanize(str_replace('is_','',$field))."').'</label><div class=\"controls\"><label class=\"checkbox\">','between'=>'','after'=>'</label><p class=\"help-block\"></p>')); echo '</div>'; ?>\n";
                } else if (!in_array($field, array('created', 'modified', 'updated'))) {
                    echo "\t\t\t<?php echo \$this->Form->input('{$field}',array('div'=>'control-group','label'=>array('class'=>'control-label'),'error'=>array('attributes'=>array('wrap'=>'span','class'=>'help-inline')),'between'=>'<div class=\"controls\">','after'=>'<p class=\"help-block\"></p>')); ";
					if ($field == $primaryKey) {
						echo "?>\n";
					} else {
						echo "echo '</div>'; ?>\n";
					}
                }
            }
            if (!empty($associations['hasAndBelongsToMany'])) {
                foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
                    echo "\t\t\t<?php echo \$this->Form->input('{$assocName}'); ?>\n";
                }
            }
?>
			<div class="form-actions">
				<?php echo "<?php echo \$this->Form->button(__('Submit'),array('class'=>'btn btn-primary')); ?>\n"; ?>
				<?php echo "<?php echo \$this->Form->button(__('Cancel'),array('class'=>'btn btn-default')); ?>\n"; ?>
			</div>
		</fieldset>
<?php echo "\t\t<?php echo \$this->Form->end();?>\n"; ?>
	</div>
</div>