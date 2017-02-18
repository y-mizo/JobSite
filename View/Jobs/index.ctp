

<head>
    <title>
        <?php $this->assign('title', 'Jobs index'); ?>
    </title>
</head>
<?php // echo h($product['Category']['category_id']); exit;?>


<!--<div class="container">-->
<div>
    <h1>登録お仕事一覧</h1>      
    <?php if ($currentUser) : ?>
        <?php echo $this->Html->link('お仕事を追加', array('action' => 'add'), ['class' => 'btn btn-success']); ?>
    <?php endif; ?>
    <br><br><br>
    <?php foreach ($jobs as $job) : ?>
        <div class="table-responsive jobtable">

            <table class="table">
                <tbody> 
                    <tr>
                        <td class="text-right"  colspan="2">
                            登録日：<?= $this->Time->format(h($job['Job']['created']), '%Y/%m/%d'); ?>
                            最終更新日：<?= $this->Time->format(h($job['Job']['modified']), '%Y/%m/%d'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="font-size: 20px">
                            <strong><?= h($job['Job']['title']); ?></strong>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?= h($job['Job']['company_name']); ?>（<?= h($job['Category']['name']); ?>）
                        </td>
                    </tr>
                    <tr>
                        <td>応募要項</td>
                        <td>
                            <?= h($job['Job']['requirement']); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>勤務地</td>
                        <td>
                            <?= h($job['Job']['location']); ?>
                        </td>
                        </td>
                    <tr>
                        <td>想定年収</td>
                        <td>
                            <?= h($job['Job']['income']); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="actions" style="text-align: center" colspan="2">
                            <?php if ($currentUser) : ?>
                                <?php echo $this->Html->link('詳細', array('action' => 'view', $job['Job']['id']), ['class' => 'btn btn-info']); ?>
                                <?php echo $this->Html->link('編集', array('action' => 'edit', $job['Job']['id']), ['class' => 'btn btn-warning']); ?>                                    
                                <?php echo $this->Form->postLink('削除', array('action' => 'delete', $job['Job']['id']), array('class' => 'btn btn-danger', 'confirm' => '本当に削除してもよろしいですか?')); ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php endforeach; ?>  
    <!-- <?php
    echo $this->Paginator->counter(array(
        'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
    ));
    ?> -->
    <div style="text-align: center">                         
        <?= $this->element('pagination'); ?>                                        
    </div> 
</div>
<!--</div>-->