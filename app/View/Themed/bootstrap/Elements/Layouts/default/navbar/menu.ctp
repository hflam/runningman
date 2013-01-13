<?php if ($this->Session->read('Auth.User.id')) { ?>
    <?php echo $this->MenuBuilder->build('admin-navbar',array('class'=>'nav')); ?>
<?php }  else { ?>
    <?php echo $this->MenuBuilder->build('admin-navbar-loggedout',array('class'=>'nav')); ?>
<?php } ?>