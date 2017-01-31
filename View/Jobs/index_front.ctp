<?php $this->assign('title', 'お仕事情報'); ?>
<?php echo $this->element('Jobs/header-setting'); ?>

<div class="container">
    <div class="row" style="text-align: right">
        <?php echo $this->Form->create('Search', array('class' => 'form-horizontal', 'url' => 'index_front', 'class' => 'form-inline')); ?>
        <div class="form-group">
        <?php echo $this->Form->input('keyword', ['class' => 'form-control', 'placeholder' => 'キーワード検索', 'label' => false]); ?>
        </div>
        <div class="form-group">
        <?= $this->Form->input('検索', ['action'=> 'index_front', 'type' => 'submit', 'class' => 'btn btn-primary', 'label' => false]); ?>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
    <div class="row">
        <?php if ($this->request->data) : ?>
        <h1><?php echo '『'. $this->request->data['Search']['keyword']. '』'. 'の検索結果です'; ?></h1>
            <p><?php // echo $this->Html->link(
//                '検索ページに戻る',
//                ['action' => 'search']); ?></p>           
        <?php else : ?>
            <h1>登録お仕事一覧</h1>
            <p>各項目クリックでソートできます。</p>
            <p><?php // echo $this->Html->link(
//                'お仕事検索はこちら',
//                ['action' => 'search']); ?></p>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th><?php echo $this->Paginator->sort('created', '掲載日'); ?></th>
                        <th><?php echo $this->Paginator->sort('modified', '修正日'); ?></th>
                        <th><?php echo $this->Paginator->sort('category_id', 'カテゴリ'); ?></th>
                        <th><?php echo $this->Paginator->sort('title', 'タイトル'); ?></th>                
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
                                <?= $this->Html->link(
                                    $job['Job']['title'],
                                    ['action' => 'view_front', $job['Job']['id']]); ?>
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
            <?php // if (!$this->request->data) : ?>
                <?= $this->element('pagination'); ?>         
            <?php // endif; ?>
        </div> 
    </div>
</div>
    
