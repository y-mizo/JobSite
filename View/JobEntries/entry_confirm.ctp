<?php $this->assign('title', '入力内容確認'); ?>

<div class="container">
    <div class="table-responsive">
        <h1>入力内容確認</h1>
        <?php echo $this->Form->create('JobEntry'); ?>
        <!--<div class="table-responsive">-->
        <table>
            <?php // var_dump($data); exit; ?>
            <tr>
                <td>お名前：</td>
                <td><?php echo h($data['JobEntry']['name']) . "<br>"; ?></td>
            </tr>
            <tr>
                <td>メールアドレス：</td><td><?php echo h($data['JobEntry']['email']) . "<br>"; ?></td>
            </tr>
        </table>
    </div>   
        <?php echo $this->Html->link('back', ['controller' => 'JobEntries', 'action' => 'entry', $data['JobEntry']['id']]); ?>
        <?php echo $this->Form->input('送信する', ['name' => 'send', 'controller' => 'JobEntries', 'action' => 'entry_complete', 'type' => 'submit', 'label' => false]); ?>
        <?php echo $this->Form->end(); ?>
</div>
