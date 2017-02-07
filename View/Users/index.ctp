<?php $this->assign('title', 'ユーザ一覧'); ?>

<div class="users index">
    <h1><?php echo __('ユーザ一覧'); ?></h1>
    <?php if ($currentUser['role'] === 'admin') : ?>
        <?php echo $this->Html->link(__('ユーザ新規登録'), array('action' => 'add'), ['class' => 'btn btn-primary btn-success']); ?>
    <?php endif; ?>
    <div class="table-responsive">
        <table class="table table-striped">
<!--<table cellpadding="0" cellspacing="0">-->
            <thead>
                <tr>
                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                    <th><?php echo $this->Paginator->sort('username'); ?></th>
                    <th><?php echo $this->Paginator->sort('email'); ?></th>
                    <th><?php echo $this->Paginator->sort('role'); ?></th>
                    <!--<th><?php echo $this->Paginator->sort('created'); ?></th>-->
                    <!--<th><?php echo $this->Paginator->sort('modified'); ?></th>-->
                    <?php if ($currentUser['role'] === 'admin') : ?>
                        <th class="actions"><?php echo __('Actions'); ?></th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo h($user['User']['id']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                        <!--<td><?php echo h($user['User']['password']); ?>&nbsp;</td>-->
                        <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['role']); ?>&nbsp;</td>
                        <!--<td><?php echo h($user['User']['created']); ?>&nbsp;</td>-->
                        <!--<td><?php echo h($user['User']['modified']); ?>&nbsp;</td>-->
                        <?php if ($currentUser['role'] === 'admin') : ?>
                            <td class="actions">
                                <?php echo $this->Html->link(__('詳細'), array('action' => 'view', $user['User']['id']), ['class' => 'btn btn-primary btn-info']); ?>
                                <?php echo $this->Html->link(__('編集'), array('action' => 'edit', $user['User']['id']), ['class' => 'btn btn-warning btn-info']); ?>                                    
                                <?php echo $this->Form->postLink(__('削除'), array('action' => 'delete', $user['User']['id']), array('class' => 'btn btn-primary btn-danger', 'confirm' => __('本当に削除しますか? Are you sure you want to delete # %s?', $user['User']['id']))); ?>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <!-- ページ情報を表示させる       <p>
    <?php
    echo $this->Paginator->counter(array(
        'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
    ));
    ?>	</p>-->
    
    <div style="text-align: center">                         
        <?= $this->element('pagination'); ?>                                        
    </div> 
</div>

    

