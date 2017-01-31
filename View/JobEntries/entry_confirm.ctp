<?php $this->assign('title', '入力内容確認'); ?>
<?php echo $this->element('Jobs/header-setting'); ?>

<div class="container">
    <h1>入力内容確認</h1>
    <?php echo $this->Form->create('JobEntry'); ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <td class="text-right">お名前：</td>
                <td><?php echo h($data['JobEntry']['name']) . "<br>"; ?></td>
            </tr>
            <tr>
                <td class="text-right">メールアドレス：</td>
                <td><?php echo h($data['JobEntry']['email']) . "<br>"; ?></td>
            </tr>
        </table>
    </div>
    <ul class="list-inline text-center">
        <li><?php echo $this->Html->link('戻る', ['controller' => 'JobEntries', 'action' => 'entry', $data['JobEntry']['id']]); ?></li>
        <li><?= $this->Form->input('送信する', ['controller' => 'JobEntries', 'action'=> 'entry_complete', 'type' => 'submit', 'class' => 'btn btn-primary btn-lg', 'label' => false]); ?></li>
    </ul>
    <?php echo $this->Form->end(); ?>
</div> 