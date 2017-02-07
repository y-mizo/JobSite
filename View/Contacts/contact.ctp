<?php $this->assign('title', 'お問い合わせ'); ?>
<?php echo $this->element('Contacts/header-setting'); ?>

<div class="container">
    <h1>お問い合わせフォーム</h1>
    <div class="form-group">
        <?php echo $this->Form->create('Contact', ['novalidate' => true]); ?>
    </div>
    <div class="form-group" style="width: 50%">
        <?php echo $this->Form->input('name', ['type' => 'text', 'class' => 'form-control', 'label' => 'お名前']); ?>
    </div>
    <div class="form-group" style="width: 50%">
        <?php echo $this->Form->input('email', ['type' => 'email', 'class' => 'form-control', 'label' => 'メールアドレス']); ?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('body', ['type' => 'textarea', 'class' => 'form-control', 'label' => 'お問い合わせ内容']); ?>
    </div>
    <?= $this->Form->input('確認する', ['action'=> 'confirm', 'type' => 'submit', 'class' => 'btn btn-primary', 'label' => false]); ?>
    <?php echo $this->Form->end(); ?>
</div>