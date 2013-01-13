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
	<div class="btn-group pull-right">
<?php
	echo "\t\t<?php echo \$this->Html->link(\$this->Icon->css('pencil').' '.__('Edit " . $singularHumanName ."'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('escape'=>false,'class'=>'btn btn-default btn-small pull-right')); ?>\n";
	echo "\t\t<?php echo \$this->Form->postLink(\$this->Icon->css('trash','white').' '.__('Delete " . $singularHumanName . "'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('escape'=>false,'class'=>'btn btn-danger btn-small pull-right'), __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
	echo "\t\t<?php echo \$this->Html->link(\$this->Icon->css('list-alt').' '.__('List " . $pluralHumanName . "'), array('action' => 'index'), array('escape'=>false,'class'=>'btn btn-default btn-small pull-right')); ?>\n";
	echo "\t\t<?php echo \$this->Html->link(\$this->Icon->css('plus','white').' '.__('New " . $singularHumanName . "'), array('action' => 'add'), array('escape'=>false,'class'=>'btn btn-primary btn-small pull-right')); ?>\n";
?>
	</div>
	<h1><?php echo "<?php  echo __('{$singularHumanName}');?>";?> <small><?php echo "<?php echo __('{$pluralHumanName} Details');?>";?></small></h1>
</div>
<div class="row">
	<div class="span12">
		<dl>
<?php
    foreach ($fields as $field) {
        $isKey = false;
        if (!empty($associations['belongsTo'])) {
            foreach ($associations['belongsTo'] as $alias => $details) {
                if ($field === $details['foreignKey']) {
                    $isKey = true;
                    echo "\t\t\t<dt><?php echo __('" . Inflector::humanize(Inflector::underscore($alias)) . "'); ?></dt>\n";
                    echo "\t\t\t<dd><?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>&nbsp;</dd>\n";
                    break;
                }
            }
        }
        if ($isKey !== true) {
            if ($field==="id"||$field==="hash"||$field==="password") {
                /* echo "\t\t\t<dt style=\"display:none;\"><?php echo __('" . Inflector::humanize($field) . "');?></dt>\n";
                echo "\t\t\t<dd style=\"display:none;\"><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']);?>&nbsp;</dd>\n"; */
            } else if (substr($field,0,3)=="is_") {
                echo "\t\t\t<dt><?php echo __('" . substr(Inflector::humanize($field),3,strlen($field)) . "');?></dt>\n";
                echo "\t\t\t<dd>\n\t\t\t\t<?php if (\${$singularVar}['{$modelClass}']['{$field}']) { ?>\n\t\t\t\t\t<?php echo \$this->Icon->get('tick'); ?>\n\t\t\t\t<?php } else { ?>\n\t\t\t\t\t<?php echo \$this->Icon->get('cross'); ?>\n\t\t\t\t<?php } ?>\n\t\t\t</dd>\n";
            } else if ($field === "created"||$field === "modified") {
                echo "\t\t\t<dt><?php echo __('" . Inflector::humanize($field) . "');?></dt>\n";
                echo "\t\t\t<dd><?php echo \$this->Time->format('m/d/Y g:ia', \${$singularVar}['{$modelClass}']['{$field}']);?>&nbsp;</dd>\n";
            } else {
                echo "\t\t\t<dt><?php echo __('" . Inflector::humanize($field) . "');?></dt>\n";
                echo "\t\t\t<dd><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']);?>&nbsp;</dd>\n";
            }
        }
    }
    ?>
        </dl>
    </div>
</div>
<?php
if (!empty($associations['hasOne'])) :
    foreach ($associations['hasOne'] as $alias => $details): ?>
<div class="row">
    <div class="span12">
		<?php echo "<?php echo \$this->Html->link(\$this->Icon->css('pencil').' '.__('Edit " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'edit', \${$singularVar}['{$alias}']['{$details['primaryKey']}']), array('class'=>'btn btn-small btn-default pull-right','escape'=>false)); ?>\n";?>
        <h3><?php echo "<?php echo __('" . Inflector::humanize($details['controller']) . "');?>";?></h3>
        <?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])):?>\n";?>
        <dl>
<?php
          $foreignKey = strtolower($singularHumanName).'_id';
          foreach ($details['fields'] as $field) {
            if ($field==="id"||$field==="hash"||$field==="password"||$field===$foreignKey) {
               /* echo "\t\t\t<dt style=\"display:none;\"><?php echo __('" . Inflector::humanize($field) . "');?></dt>\n";
                echo "\t\t\t<dd style=\"display:none;\"><?php echo h(\${$singularVar}['{$alias}']['{$field}']);?>&nbsp;</dd>\n"; */
            } else if (substr($field,0,3)=="is_") {
                echo "\t\t\t<dt><?php echo __('" . substr(Inflector::humanize($field),3,strlen($field)) . "');?></dt>\n";
                echo "\t\t\t<dd>\n\t\t\t\t<?php if (\${$singularVar}['{$modelClass}']['{$field}']) { ?>\n\t\t\t\t\t<?php echo \$this->Icon->get('tick'); ?>\n\t\t\t\t<?php } else { ?>\n\t\t\t\t\t<?php echo \$this->Icon->get('cross'); ?>\n\t\t\t\t<?php } ?>\n\t\t\t</dd>\n";
            } else if ($field === "created"||$field === "modified") {
                echo "\t\t\t<dt><?php echo __('" . Inflector::humanize($field) . "');?></dt>\n";
                echo "\t\t\t<dd><?php echo \$this->Time->format('m/d/Y g:ia', \${$singularVar}['{$alias}']['{$field}']);?>&nbsp;</dd>\n";
            } else {
                echo "\t\t\t<dt><?php echo __('" . Inflector::humanize($field) . "');?></dt>\n";
                echo "\t\t\t<dd><?php echo h(\${$singularVar}['{$alias}']['{$field}']);?>&nbsp;</dd>\n";
            }
        }
?>
        </dl>
        <?php echo "<?php endif; ?>\n";?>
    </div>
</div>
<?php
    endforeach;
endif;
if (empty($associations['hasMany'])) {
    $associations['hasMany'] = array();
}
if (empty($associations['hasAndBelongsToMany'])) {
    $associations['hasAndBelongsToMany'] = array();
}
$relations = array_merge($associations['hasMany'], $associations['hasAndBelongsToMany']);
$i = 0;
foreach ($relations as $alias => $details):
    $otherSingularVar = Inflector::variable($alias);
    $otherPluralHumanName = Inflector::humanize($details['controller']);
    ?>
<div class="row">
    <div class="span12">
		<?php echo "<?php echo \$this->Html->link(__('New " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add'), array('class'=>'btn btn-small btn-primary pull-right'));?>\n";?>
        <h3><?php echo "<?php echo __('" . $otherPluralHumanName . "');?>";?></h3>
        <?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])):?>\n";?>
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tr>
<?php
             $foreignKey = strtolower($singularHumanName).'_id';
             foreach ($details['fields'] as $field) {
                if ($field==="id"||$field==="created"||$field==="modified"||$field==="hash"||$field==="password"||$field===$foreignKey) {
                    /* echo "\t\t\t\t<th style=\"display: none;\"><?php echo __('" . Inflector::humanize($field) . "'); ?></th>\n"; */
                } else {
                    echo "\t\t\t\t<th><?php echo __('" . Inflector::humanize($field) . "'); ?></th>\n";
                }
            }
?>
                <th><?php echo "<?php echo __('Actions');?>";?></th>
            </tr>
<?php
echo "\t\t\t<?php
        \$i = 0;
        foreach (\${$singularVar}['{$alias}'] as \${$otherSingularVar}): ?>\n";
        echo "\t\t\t<tr>\n";
            foreach ($details['fields'] as $field) {
                if ($field==="id"||$field==="created"||$field==="modified"||$field==="hash"||$field==="password"||$field===$foreignKey) {
                    /* echo "\t\t\t\t<td style=\"display: none;\"><?php echo \${$otherSingularVar}['{$field}'];?></td>\n"; */
				} else if (substr($field,0,3)=="is_") {
					echo "\t\t\t\t<td>\n\t\t\t\t<?php if (\${$otherSingularVar}['{$field}']) { ?>\n\t\t\t\t\t<?php echo \$this->Icon->get('tick'); ?>\n\t\t\t\t<?php } else { ?>\n\t\t\t\t\t<?php echo \$this->Icon->get('cross'); ?>\n\t\t\t\t<?php } ?>\n\t\t\t\t</td>\n";
				} else {
                    echo "\t\t\t\t<td><?php echo \${$otherSingularVar}['{$field}'];?></td>\n";
                }
            }

			echo "\t\t\t\t<td>\n";
				echo "\t\t\t\t\t<div class=\"btn-group\">\n";
					echo "\t\t\t\t\t\t<?php echo \$this->Html->link(\$this->Icon->css('search','white').' '.__('View'), array('controller' => '{$details['controller']}', 'action' => 'view', \${$otherSingularVar}['{$details['primaryKey']}']), array('escape'=>false, 'class'=>'btn btn-small btn-primary')); ?>\n";
					echo "\t\t\t\t\t\t<?php echo \$this->Html->link(\$this->Icon->css('pencil').' '.__('Edit'), array('controller' => '{$details['controller']}', 'action' => 'edit', \${$otherSingularVar}['{$details['primaryKey']}']), array('escape'=>false, 'class'=>'btn btn-small btn-default')); ?>\n";
					echo "\t\t\t\t\t\t<?php echo \$this->Form->postLink(\$this->Icon->css('trash','white').' '.__('Delete'), array('controller' => '{$details['controller']}', 'action' => 'delete', \${$otherSingularVar}['{$details['primaryKey']}']), array('escape'=>false, 'class'=>'btn btn-small btn-danger'), __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
				echo "\t\t\t\t\t</div>\n";
			echo "\t\t\t\t</td>\n";
        echo "\t\t\t</tr>\n";

echo "\t\t<?php endforeach; ?>\n";
?>
        </table>
<?php echo "\t\t<?php endif; ?>\n";?>
    </div>
</div>
<?php endforeach;?>
