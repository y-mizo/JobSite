<head>
    <title>
        <?php $this->assign('title', 'Job Categorys index'); ?>
    </title>
</head>


<!--<div class="container">-->
    <div>
        <h2>ジョブカテゴリ一覧</h2>
        <p>最終更新日時順でソートされます。</p>
                    <?php // if ($currentUser) : ?>
                        <?= $this->Html->link(
                            '追加',
                            ['action' => 'add']); ?> 
                    <?php // endif; ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                       <th>id</th>
                       <th>カテゴリ</th>
                        
                        <?php // if ($currentUser) : ?>
                        <th colspan="2">操作</th>
                        <?php // endif; ?>
                    </tr>
                </thead>
                        <tbody>

                    <?php foreach ($categories as $category) : ?>
                        <tr>
                            <td>
                                <?= $category['Category']['id']; ?>
                            </td>
                            <td>
                                <?= $category['Category']['name']; ?>
                            </td>
                            
                            <?php // if ($currentUser) : ?>
                            
                            <td>
                                <?= $this->Html->link(
                                    '編集',
                                    ['action' => 'edit', $category['Category']['id']]); ?>
                            </td>
                            <td>
                                <?= $this->Form->postLink(
                                    '削除',
                                    ['action' => 'delete', $category['Category']['id']], ['confirm' => '削除します。よろしいですか?']); ?>
                            </td>
                            <?php // endif; ?>
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