<head>
    <title>
        <?php $this->assign('title', 'Notices index'); ?>
    </title>
</head>


<!--<div class="container">-->
    <div>
        <h1>お知らせ一覧</h1>
        <p>お知らせは最終更新日時順でソートされます。</p>
            <?php if ($currentUser) : ?>
                <?php echo $this->Html->link('お知らせを追加', array('action' => 'add'), ['class' => 'btn btn-success']); ?>
            <?php endif; ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>掲載日</th>
                        <th>最終更新日</th>
                        <th>タイトル</th>
                        <?php if ($currentUser) : ?>
                        <th>操作</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                        <tbody>

                    <?php foreach ($notices as $notice) : ?>
                        <tr>
                            <td>
                                <?= $this->Time->format($notice['Notice']['created'], '%Y/%m/%d'); ?>
                            </td>

                            <td>
                                <?= $this->Time->format($notice['Notice']['modified'], '%Y/%m/%d'); ?>
                            </td>
                            <td>
                                <?= $notice['Notice']['subject']; ?>
                            </td>
                            <td class="actions">
                            <?php if ($currentUser) : ?>
                                <?php echo $this->Html->link('詳細', array('action' => 'view', $notice['Notice']['id']), ['class' => 'btn btn-info']); ?>
                                <?php echo $this->Html->link('編集', array('action' => 'edit', $notice['Notice']['id']), ['class' => 'btn btn-warning']); ?>                                    
                                <?php echo $this->Form->postLink('削除', array('action' => 'delete', $notice['Notice']['id']), array('class' => 'btn btn-danger', 'confirm' => '本当に削除してもよろしいですか?')); ?>
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