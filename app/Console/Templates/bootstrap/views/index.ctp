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
	<?php echo "<?php echo \$this->Html->link(\$this->Icon->css('plus','white').' '.__('New " . $singularHumanName . "'), array('action' => 'add'), array('class'=>'btn btn-primary btn-small pull-right','escape'=>false)); ?>\n";?>
    <h1><?php echo "<?php echo __('{$pluralHumanName}');?>";?> <small><?php echo "<?php echo __('List of {$pluralHumanName}');?>";?></small></h1>
</div>
<div class="row">
    <div class="span12">
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tr>
<?php foreach ($fields as $field):?>
<?php if ($field === "created"||$field === "modified"||$field === "id"||$field === "hash"||$field === "password") { /* ?>
                <th style="display: none;"><?php echo "<?php echo \$this->Paginator->sort('{$field}');?>";?></th>
<?php*/ } else { ?>
                <th><?php echo "<?php echo \$this->Paginator->sort('{$field}');?>";?></th>
<?php } ?>
<?php endforeach;?>
                <th><?php echo "<?php echo __('Actions');?>";?></th>
            </tr>
        <?php
        echo "<?php
        \$i = 0;
        foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
        echo "\t\t\t<tr>\n";
            foreach ($fields as $field) {
                $isKey = false;
                if (!empty($associations['belongsTo'])) {
                    foreach ($associations['belongsTo'] as $alias => $details) {
                        if ($field === $details['foreignKey']) {
                            $isKey = true;
                            echo "\t\t\t\t<td><?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?></td>\n";
                            break;
                        }
                    }
                }
                if ($isKey !== true) {
                    if ($field === "created"||$field === "modified") {
                        /* echo "\t\t\t\t<td style=\"display:none;\"><?php echo \$this->Time->format('m/d/Y g:ia', \${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n"; */
                    } else if (substr($field,0,3)=="is_") {
                        echo "\t\t\t\t<td>\n\t\t\t\t<?php if (\${$singularVar}['{$modelClass}']['{$field}']) { ?>\n\t\t\t\t\t<?php echo \$this->Icon->get('tick'); ?>\n\t\t\t\t<?php } else { ?>\n\t\t\t\t\t<?php echo \$this->Icon->get('cross'); ?>\n\t\t\t\t<?php } ?>\n\t\t\t\t</td>\n";
                    } else if ($field === "id"||$field === "hash"||$field === "password") {
                        /* echo "\t\t\t\t<td style=\"display: none;\"><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n"; */
                    } else {
                        echo "\t\t\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
                    }
                }
            }

			echo "\t\t\t\t<td>\n";
				echo "\t\t\t\t\t<div class=\"btn-group\">\n";
					echo "\t\t\t\t\t\t<?php echo \$this->Html->link(\$this->Icon->css('search','white').' '.__('View'), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('escape'=>false, 'class'=>'btn btn-small btn-primary')); ?>\n";
					echo "\t\t\t\t\t\t<?php echo \$this->Html->link(\$this->Icon->css('pencil').' '.__('Edit'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('escape'=>false, 'class'=>'btn btn-small btn-default')); ?>\n";
					echo "\t\t\t\t\t\t<?php echo \$this->Form->postLink(\$this->Icon->css('trash','white').' '.__('Delete'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('escape'=>false, 'class'=>'btn btn-small btn-danger'), __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
				echo "\t\t\t\t\t</div>\n";
			echo "\t\t\t\t</td>\n";
        echo "\t\t\t</tr>\n";

        echo "\t\t<?php endforeach; ?>\n";
        ?>
        </table>
        <p>
        <?php echo "<?php
        echo \$this->Paginator->counter(array(
        'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?>\n";?>
        </p>
        <div class="pagination pagination-centered">
            <ul>
            <?php
                echo "<?php\n";
                echo "\t\t\t\techo \$this->Paginator->prev('&larr; '.__('Previous', true), array('tag'=>'li','class'=>'prev', 'escape'=>false), '<a href=\"#\">&larr; '.__('Previous',true).'</a>', array('tag'=>'li','class'=>'prev disabled', 'escape'=>false));\n";
                echo "\t\t\t\techo \$this->Paginator->numbers(array('tag'=>'li','separator'=>'','disabled'=>'active'));\n";
                echo "\t\t\t\techo \$this->Paginator->next(__('Next', true).' &rarr;', array('tag'=>'li','class'=>'next','escape'=>false), '<a href=\"#\">'.__('Next',true).' &rarr;</a>', array('tag'=>'li','class' => 'next disabled', 'escape'=>false));\n";
                echo "\t\t\t?>\n";
            ?>
            </ul>
        </div>
    </div>
</div>