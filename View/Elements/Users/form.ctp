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
    <legend><b><?= $legend; ?></b></legend>

    <?php
    echo $this->Form->input('username', array(
//        'required' => 'false'
//    'placeholder' => 'Username'
    ));
    ?>
    <?php if ($this->action === 'add') : ?>
        <?php
        echo $this->Form->input('password', array(
//            'placeholder' => 'Password',
//        'required' => 'false'
        ));
        ?>
        <?php
        echo $this->Form->input('password_confirm', array(
//            'placeholder' => 'Password_confirm',
            'type' => 'password',
//        'required' => 'false'
        ));
        ?>
    <?php endif; ?>

    <?php
    echo $this->Form->input('email', array(
//    'placeholder' => 'email'
    ));
    ?>
    <?php
    echo $this->Form->input('role', array(
        'empty' => 'Choose one',
        'type' => 'select',
//        'required' => 'false',
        'options' => [
            'admin' => 'Admin',
            'author' => 'Author']
    ));
    ?>

    <?php if (!empty($this->request->data)) : ?>
        <?= $this->Form->hidden('id'); ?>
    <?php endif; ?>
    <?php
    echo $this->Form->submit($submitLabel, array(
        'div' => 'form-group',
        'class' => 'btn btn-primary'
    ));
    ?>

</fieldset>
<?php echo $this->Form->end(); ?>
 