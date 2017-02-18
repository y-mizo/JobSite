<?php $this->assign('title', '入力内容確認'); ?>
<?php echo $this->element('Jobs/header-setting'); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <h1>入力内容確認</h1>
            <?php echo $this->Form->create('JobEntry'); ?>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <td class="text-right active"  style="width: 30%">お名前：</td>
                        <td><?php echo h($data['JobEntry']['name']); ?></td>
                    </tr>
                    <tr>
                        <td class="text-right active">メールアドレス：</td>
                        <td><?php echo h($data['JobEntry']['email']); ?></td>
                    </tr>
                </table>
            </div>
            <ul class="list-inline text-center">
                <li><?php echo $this->Html->link('戻る', ['controller' => 'JobEntries', 'action' => 'entry', $data['JobEntry']['id']]); ?></li>
                <li><?= $this->Form->input('送信する', ['controller' => 'JobEntries', 'action' => 'entry_complete', 'type' => 'submit', 'class' => 'btn btn-primary btn-lg', 'label' => false]); ?></li>
            </ul>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>