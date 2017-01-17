<head>
    <title>
        <?php $this->assign('title', 'login'); ?>
    </title>
</head>

<?php // $this->start('contentarea'); ?>
<div class="container form-format">  
    <div class="row">  
        <div class="col-md-4 col-md-offset-4">  
            <?php
            echo $this->Form->create('User', array(
                'inputDefaults' => array(
                    'div' => 'form-group',
                    'wrapInput' => false,
                    'class' => 'form-control'
                ),
                'class' => 'well'
            ));
            ?>
            <fieldset>
                <legend><b>Login</b></legend>
                <?php
                echo $this->Form->input('username', array(
//                    'placeholder' => 'Username'
                ));
                ?>
                <?php
                echo $this->Form->input('password', array(
//                    'placeholder' => 'Password'
                ));
                ?>
                <?php
                echo $this->Form->submit('Go', array(
                    'div' => 'form-group',
                    'class' => 'btn btn-default'             
                ));
                ?>
            </fieldset>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>
<?php // $this->end(); ?>
