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
        echo $this->Html->css('admin');
        echo $this->Html->css('font-awesome.min');

        echo $this->Html->script('jquery.min');
        echo $this->Html->script('bootstrap.min');
        ?>
    </head>
    <body>      
        <?php echo $this->element('Admins/navbar'); ?>
        <div class="content">
            <?php echo $this->Session->flash(); ?>
            <div class="col-md-2 sidebar">
                <?php echo $this->element('Admins/sidebar'); ?>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 main">
                        <?php echo $this->fetch('content'); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $this->element('footer'); ?>
        <?php echo $this->element('sql_dump'); ?>
    </body>
</html>