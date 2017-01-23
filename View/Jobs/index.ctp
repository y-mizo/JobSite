<head>
    <title>
        <?php $this->assign('title', 'Jobs index'); ?>
    </title>
</head>
<?php // echo h($product['Category']['category_id']); exit;?>


<!--<div class="container">-->
    <div>
        <h2>おしごと一覧</h2>
        <p>最終更新日時順でソートされます。</p>

        
        
        
                    <?php if ($currentUser) : ?>
                        <?= $this->Html->link(
                            '追加',
                            ['action' => 'add']); ?> 
                    <?php endif; ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>掲載日</th>
                        <th>最終更新日</th>
                        <th>カテゴリ</th>
                        <th>タイトル</th>
                        <th>内容</th>
                        <?php if ($currentUser) : ?>
                        <th colspan="3">操作</th>
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
                            <?php if ($currentUser) : ?>
                            <td>
                                <?= $this->Html->link(
                                    '詳細',
                                    ['action' => 'view', $job['Job']['id']]); ?>
                            </td>
                            <td>
                                <?= $this->Html->link(
                                    '編集',
                                    ['action' => 'edit', $job['Job']['id']]); ?>
                            </td>
                            <td>
                                <?= $this->Form->postLink(
                                    '削除',
                                    ['action' => 'delete', $job['Job']['id']], ['confirm' => '削除します。よろしいですか?']); ?>
                            </td>
                            <?php endif; ?>
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