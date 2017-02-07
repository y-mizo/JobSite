

<head>
    <title>
        <?php $this->assign('title', 'Jobs index'); ?>
    </title>
</head>
<?php // echo h($product['Category']['category_id']); exit;?>


<!--<div class="container">-->
    <div>
        <h1>登録お仕事一覧</h1>
        <p>最終更新日時順でソートされます。</p>       
            <?php if ($currentUser) : ?>
                <?php echo $this->Html->link('お仕事を追加', array('action' => 'add'), ['class' => 'btn btn-success']); ?>
            <?php endif; ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>掲載日</th>
                        <th>最終更新日</th>
                        <th>カテゴリ</th>
                        <th>タイトル</th>
                        <?php if ($currentUser) : ?>
                        <th>操作</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($jobs as $job) : ?>
                        <tr>
                            <td>
                                <?= $this->Time->format($job['Job']['created'], '%Y/%m/%d'); ?>
                            </td>

                            <td>
                                <?= $this->Time->format($job['Job']['modified'], '%Y/%m/%d'); ?>
                            </td>
                            <td>
                                <?= $job['Category']['name']; ?>
                            </td>
                            <td>
                                <?= $job['Job']['title']; ?>
                            </td>
                            <td class="actions">
                                <?php if ($currentUser) : ?>
                                    <?php echo $this->Html->link('詳細', array('action' => 'view', $job['Job']['id']), ['class' => 'btn btn-info']); ?>
                                    <?php echo $this->Html->link('編集', array('action' => 'edit', $job['Job']['id']), ['class' => 'btn btn-warning']); ?>                                    
                                    <?php echo $this->Form->postLink('削除', array('action' => 'delete', $job['Job']['id']), array('class' => 'btn btn-danger', 'confirm' => '本当に削除してもよろしいですか?')); ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
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