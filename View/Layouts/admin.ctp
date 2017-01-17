<!DOCTYPE html>
<html>
    <head>
        <title>
            SiteBase |
            <?php echo $this->fetch('title'); ?>
        </title>
        <?php
        echo $this->Html->charset();
        echo $this->Html->meta('icon');
        echo $this->fetch('css');
        echo $this->fetch('script');

        echo $this->Html->css('bootstrap.min');
        echo $this->Html->css('sticky-footer-navbar.css');
        echo $this->Html->css('front');
        echo $this->Html->css('subpage');
        echo $this->Html->css('dashboard');

        echo $this->Html->script('jquery.min');
        echo $this->Html->script('bootstrap.min');
        ?>
    </head>
    <body>
        <!--navbar-->
        <?= $this->element('navbar_admin'); ?>
        
    <div class="container-fruid">

        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
            <!--<div class="col-xs-12 col-sm-3 col-md-2 sidebar">-->
                <?php // echo $this->fetch('sidebar'); ?>
                <ul class="nav nav-sidebar">
                    <li><?php echo $this->Html->link(__('HOME'), array('controller' => 'admins', 'action' => 'index')); ?></li>
                    <li><?php echo $this->Html->link(__('USER INDEX'), array('controller' => 'users', 'action' => 'index')); ?></li>
                    <li><?php echo $this->Html->link(__('NOTICE INDEX'), array('controller' => 'notices', 'action' => 'index')); ?></li>
                </ul>
            </div>
        <!--</div>-->

    <!--contents area-->
    <!--<div class="row">-->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <!--<div class="col-xs-12 col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">-->
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->fetch('content'); ?>
        </div>
    </div>
    </div>

    <!--footer-->
    <?= $this->element('footer'); ?>
    <?php echo $this->element('sql_dump'); ?>
</body>
</html>