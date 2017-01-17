<head>
    <title>
        <?php $this->assign('title', 'Notices index'); ?>
    </title>
</head>


<!--<div class="container">-->
    <div>
        <h2>お知らせ一覧</h2>
        <p>お知らせは最終更新日時順でソートされます。</p>
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
                        <th>タイトル</th>
                        <?php if ($currentUser) : ?>
                        <th colspan="3">操作</th>
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
                            <?php if ($currentUser) : ?>
                            <td>
                                <?= $this->Html->link(
                                    '詳細',
                                    ['action' => 'view', $notice['Notice']['id']]); ?>
                            </td>
                            <td>
                                <?= $this->Html->link(
                                    '編集',
                                    ['action' => 'edit', $notice['Notice']['id']]); ?>
                            </td>
                            <td>
                                <?= $this->Form->postLink(
                                    '削除',
                                    ['action' => 'delete', $notice['Notice']['id']], ['confirm' => '削除します。よろしいですか?']); ?>
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