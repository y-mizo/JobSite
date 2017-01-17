<?php $this->assign('title', '入力内容確認'); ?>
<h1>入力内容確認</h1>
<?php echo $this->Form->create('Contact'); ?>
<!--<div class="table-responsive">-->
<table>
    <tr>
        <td>お名前：</td>
        <td><?php echo h($data['Contact']['name']) . "<br>"; ?></td>
    </tr>
    <tr>
        <td>メールアドレス：</td><td><?php echo h($data['Contact']['email']) . "<br>"; ?></td>
    </tr>
    <tr>
        <td>お問い合わせ内容：</td><td><?php echo nl2br(h($data['Contact']['body'])) . "<br>"; ?></td>
    </tr>
</table>
<!--</div>-->
<?php echo $this->Html->link('back', ['controller' => 'contacts', 'action' => 'contact']); ?>
<?php echo $this->Form->input('送信する', ['name' => 'send', 'controller' => 'contacts', 'type' => 'submit', 'label' => false]); ?>
<?php echo $this->Form->end(); ?>