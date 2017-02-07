<?php $this->assign('title', '入力内容確認'); ?>
<?php echo $this->element('Contacts/header-setting'); ?>
    
<div class="container">
    <h1>入力内容確認</h1>
    <?php echo $this->Form->create('Contact'); ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <td class="text-right" style="width: 20%">お名前：</td>
                <td><?php echo h($data['Contact']['name']) . "<br>"; ?></td>
            </tr>
            <tr>
                <td class="text-right" style="width: 20%">メールアドレス：</td><td><?php echo h($data['Contact']['email']) . "<br>"; ?></td>
            </tr>
            <tr>
                <td class="text-right" style="width: 20%">お問い合わせ内容：</td><td><?php echo nl2br(h($data['Contact']['body'])) . "<br>"; ?></td>
            </tr>
        </table>
    </div>
    <ul class="list-inline text-center">
        <li><?php echo $this->Html->link('戻る', ['controller' => 'contacts', 'action' => 'contact']); ?></li>
        <li><?= $this->Form->input('送信する', ['action'=> 'complete', 'type' => 'submit', 'class' => 'btn btn-primary', 'label' => false]); ?></li>
    </ul>
    <?php echo $this->Form->end(); ?>
</div>