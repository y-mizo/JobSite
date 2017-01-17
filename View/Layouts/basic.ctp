
<!DOCTYPE html>
<html>
    <head>
        <title>
            SiteBase |
            <?php echo $this->fetch('title'); ?>
        </title>
    <head>
        <title>
            <?php echo $cakeDescription ?> |
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

//        echo $this->Html->css('subpage');
        echo $this->Html->script('jquery.min');
        echo $this->Html->script('bootstrap.min');
//        echo $scripts_for_layout;
        ?>
    </head>
    <body>
        <!--navbar-->
        <?= $this->element('navbar'); ?>

        <!--contents area-->      
            <div id="content">
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content'); ?>
            </div>

        <!--footer-->
        <?= $this->element('footer'); ?>
        <?php echo $this->element('sql_dump'); ?>
    </body>
</html>