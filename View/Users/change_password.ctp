<head>
    <title>
        <?php $this->assign('title', 'change password'); ?>
    </title>
</head>

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
    <legend><b><?= 'Change Password' ?></b></legend>
<?= $this->Form->input('password_current', ['label' => 'Current password', 'type' => 'password']); ?>

    <?php
    echo $this->Form->input('password', array(
        'required' => 'false'
    ));
    ?>
    <?php
    echo $this->Form->input('password_confirm', array(
        'type' => 'password',
        'required' => 'false'
    ));
    ?>
  
    
    <?php if (!empty($this->request->data)) : ?>
        <?= $this->Form->hidden('id'); ?>
    <?php endif; ?>
    <?php
    echo $this->Form->submit('submit', array(
        'div' => 'form-group',
        'class' => 'btn btn-primary'
    ));
    ?>

</fieldset>
    <?php echo $this->Form->end(); ?>
 
    </div>
</div>



