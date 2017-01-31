<head>
    <title>
        <?php $this->assign('title', 'Job Categorys index'); ?>
    </title>
</head>


<!--<div class="container">-->
    <div>
        <h1>お仕事カテゴリ一覧</h1>
        <p>最終更新日時順でソートされます。</p>
            <?php echo $this->Html->link('お仕事カテゴリを追加', array('action' => 'add'), ['class' => 'btn btn-success']); ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>カテゴリ</th>
                        <th>操作</th>
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
                            <td>
                                <?php echo $this->Html->link('編集', array('action' => 'edit', $category['Category']['id']), ['class' => 'btn btn-warning']); ?>                                    
                                <?php echo $this->Form->postLink('削除', array('action' => 'delete', $category['Category']['id']), array('class' => 'btn btn-danger', 'confirm' => '本当に削除してもよろしいですか?')); ?>
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