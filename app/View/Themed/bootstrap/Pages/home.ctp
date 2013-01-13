<?php
/**
 * @var $this View
 */
?>
<?php $this->set('title_for_layout', __('Home')); ?>
<div class="page-header">
    <h1><?php echo __('Dashboard'); ?> <small><?php echo Configure::read('App.name'); ?></small></h1>
</div>
<div class="row">
	<div class="span12">
		<div class="row">
			<div class="span6">
				<h3><?php echo __('Latest news'); ?></h3>
			</div>
		</div>
	</div>
</div>