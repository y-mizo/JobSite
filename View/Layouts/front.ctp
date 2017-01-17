
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
        
       

        echo $this->Html->script('jquery.min');
        echo $this->Html->script('bootstrap.min');

        ?>
    </head>
    <body>
        <!--navbar-->
        <?= $this->element('navbar'); ?>

        <!--jumbotron-->
        <header class="jumbotron">
            <div class="container">
                <?php echo $this->fetch('title_area'); ?>
            </div>
        </header>

        <!--contents area-->
        <div id="content">

            <?php echo $this->Session->flash(); ?>

            <?php echo $this->fetch('content'); ?>
        </div>
        <!--        <div class="container-fruid">
                    <div id="content">-->
        <?php // echo $this->Session->flash(); ?>
        <?php // echo $this->fetch('contentarea'); ?>
        <!--            </div>
                </div>-->

        <!--footer-->
        <?= $this->element('footer'); ?>
        <?php echo $this->element('sql_dump'); ?>
    </body>
</html>