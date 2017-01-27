<?php $this->assign('title', 'Jobs index'); ?>
<?php $this->start('css'); ?>
<style>
    header.jumbotron {
        background-color: green;
        /*background: url("../img/p2.jpg");*/
    }
</style>
<?= $this->Html->css('pages'); ?>
<?php $this->end(); ?>

<?php $this->start('title_area'); ?>
<h2>Jobs</h2>
<?php $this->end(); ?>

<div class="container">
    <div class="row">
        <?php if ($this->request->data) : ?>
            <h1 style="text-align: center"><?php echo '※検索結果の一覧です※'; ?></h1>
            <p><?= $this->Html->link(
                '検索ページに戻る',
                ['action' => 'search']); ?></p>           
        <?php else : ?>
            <h2>おしごと一覧</h2>
            <p>最終更新日時順でソートされます。</p>
            <p><?= $this->Html->link(
                'お仕事検索はこちら',
                ['action' => 'search']); ?></p>
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
                            <td>
                                <?= $this->Html->link(
                                    '詳細',
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
            <?php if (!$this->request->data) : ?>
                <?= $this->element('pagination'); ?>         
            <?php endif; ?>
        </div> 
    </div>
</div>