<?php $this->assign('title', 'お仕事情報'); ?>
<?php echo $this->element('Jobs/header-setting'); ?>

<div class="container">
    <div class="row" style="text-align: right">
        <form action = "<?= $this->Html->url(['action' => 'index_front']); ?>" class="form-inline" method="get">
            <div class="form-group"><input type="text" name="keyword" class="form-control"></div>
            <div class="form-group"><input type="submit" value="検索" class="form-control btn btn-primary"></div>
        </form>
    </div>
    <div class="row">
        <?php if (!empty($keyword)) : ?>
            <h1><?php echo '『'. $keyword. '』'. 'の検索結果です'; ?></h1>
        <?php else : ?>
            <h1>登録お仕事一覧</h1>
            <p>各項目クリックでソートできます。</p>
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
                <?= $this->element('pagination'); ?>
        </div>
    </div>
</div>

