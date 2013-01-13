<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</a>
<a class="brand" href="#"><?php echo Configure::read('App.name'); ?></a>
<div class="nav-collapse">
    <?php echo $this->element('Layouts/default/navbar/menu'); ?>
    <?php echo $this->element('Layouts/default/navbar/login_form'); ?>
</div>
