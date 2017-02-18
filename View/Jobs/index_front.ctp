<?php $this->assign('title', 'お仕事情報'); ?>
<?php echo $this->element('Jobs/header-setting'); ?>

<div class="container">
    <div class="row" style="text-align: right">
        <p>▼ キーワードから探す</p>
        <form action = "<?= $this->Html->url(['action' => 'index_front']); ?>" class="form-inline" method="get">
            <div class="form-group"><input type="text" name="keyword" class="form-control"></div>
            <div class="form-group"><input type="submit" value="検索" class="form-control btn btn-primary"></div>
        </form>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php if (!empty($keyword)) : ?>
        <h1 style="text-align: center"><mark><?php echo '『'. $keyword. '』'. 'の検索結果です'; ?></mark></h1>
        <?php endif; ?>
        <h1>登録お仕事一覧</h1><br>
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
                            <strong>▶ <?= $this->Html->link(
                                    h($job['Job']['title']),
                                    ['action' => 'view_front', $job['Job']['id']]); ?></strong>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <!--社名とカテゴリ-->
                            <strong><?= h($job['Job']['company_name']); ?>（<?= h($job['Category']['name']); ?>）</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>応募要項：<?= h($job['Job']['requirement']); ?></td>
                    </tr>
                    <tr>
                        <td>勤務地：<?= h($job['Job']['location']); ?></td>
                    <tr>
                        <td>想定年収：<?= h($job['Job']['income']); ?></td>
                    </tr>
<!--                    <tr>
                        <td>仕事内容：<br><?= nl2br(h($job['Job']['description'])); ?></td>
                    </tr>-->
                    
                </tbody>
            </table>
            
        </div>
        <br><br>
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
</div>