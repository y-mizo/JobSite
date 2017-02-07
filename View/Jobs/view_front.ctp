<?php $this->assign('title', 'お仕事情報詳細'); ?>
<?php echo $this->element('Jobs/header-setting'); ?>

<div class="container table-responsive">
    <h1>お仕事の詳細</h1>
    <table class="table table-striped">
<!--style="width: 50%;"-->
        <tr>
            <td><strong>掲載日</strong></td>
            <td><?= h($job['Job']['created']); ?></td>
        </tr>
        <tr>
            <td><strong>最終更新日</strong></td>
            <td><?= h($job['Job']['modified']); ?></td>
        </tr>
        <tr>
            <td><strong>カテゴリ</strong></td>
            <td><?= h($job['Category']['name']); ?></td>
        </tr>
        <tr>
            <td><strong>タイトル</strong></td>
            <td><?= h($job['Job']['title']); ?></td>
        </tr>
        <tr>
            <td><strong>内容</strong></td>
            <td><?= $job_description; ?></td>
        </tr>

    </table>
    <p class="list-inline text-center">
    <?php echo $this->Html->link('このお仕事にエントリーする', ['controller' => 'JobEntries', 'action' => 'entry', $job['Job']['id']], ['class' => 'btn btn-success btn-lg']); ?></p>
</div>
