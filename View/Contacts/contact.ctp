<?php $this->assign('title', 'お問い合わせ'); ?>
<?php echo $this->element('Contacts/header-setting'); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <h1 style="text-align: center">お問い合わせフォーム</h1>
            <div class="form-group">
                <?php echo $this->Form->create('Contact', ['novalidate' => true]); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('name', ['type' => 'text', 'class' => 'form-control', 'label' => 'お名前']); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('email', ['type' => 'email', 'class' => 'form-control', 'label' => 'メールアドレス']); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('body', ['type' => 'textarea', 'class' => 'form-control', 'label' => 'お問い合わせ内容']); ?>
            </div>
            <div class="text-center">
            <?= $this->Form->input('確認する', ['action'=> 'confirm', 'type' => 'submit', 'class' => 'btn btn-primary', 'label' => false]); ?>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>