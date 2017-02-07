<!DOCTYPE html>
<html>
    <head>
        <title>
            JobSite |
            <?php echo $this->fetch('title'); ?>
        </title>
        <?php
        echo $this->Html->charset();
        echo $this->Html->meta('icon');
        echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');

        echo $this->Html->css('bootstrap.min');
        echo $this->Html->css('sticky-footer-navbar');
        echo $this->Html->css('default');
        echo $this->Html->css('front');
        
        echo $this->Html->script('jquery.min');
        echo $this->Html->script('bootstrap.min');
        ?>
    </head>
    <body>
        <!--navbar-->
        <?php echo $this->element('navbar'); ?>

        <div id="content">
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->fetch('content'); ?>
        </div>

        <?php echo $this->element('footer'); ?>
        <?php echo $this->element('sql_dump'); ?>
    </body>
</html>