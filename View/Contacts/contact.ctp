<?php $this->assign('title', 'お問い合わせ'); ?>
<div class="container">
    <h1>お問い合わせ</h1> 
    <?php echo $this->Form->create('Contact', ['novalidate' => true]); ?>
    <?php echo $this->Form->input('name', ['type' => 'text', 'label' => 'お名前']); ?>
    <?php echo $this->Form->input('email', ['type' => 'email', 'label' => 'メールアドレス']); ?>
    <?php echo $this->Form->input('body', ['type' => 'textarea', 'label' => 'お問い合わせ内容']); ?>
    <?php echo $this->Form->submit('確認する', ['action' => 'confirm', 'controller' => 'contacts', 'label' => false]); ?>
    <?php echo $this->Form->end(); ?>
</div>