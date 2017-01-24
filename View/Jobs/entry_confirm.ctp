<?php $this->assign('title', '入力内容確認'); ?>
<h1>入力内容確認</h1>
<?php echo $this->Form->create('Job_entry'); ?>
<!--<div class="table-responsive">-->
<table>
<?php // var_dump($data); exit; ?>
    <tr>
        <td>お名前：</td>
        <td><?php echo h($data['Job_entry']['name']) . "<br>"; ?></td>
    </tr>
    <tr>
        <td>メールアドレス：</td><td><?php echo h($data['Job_entry']['email']) . "<br>"; ?></td>
    </tr>
</table>
<!--</div>-->
<?php echo $this->Html->link('back', ['controller' => 'jobs', 'action' => 'entry', $data['Job_entry']['id']]); ?>
<?php echo $this->Form->input('送信する', ['name' => 'send', 'controller' => 'jobs', 'action' => 'index', 'type' => 'submit', 'label' => false]); ?>
<?php echo $this->Form->end(); ?>
