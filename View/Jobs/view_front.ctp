
<div class="container table-responsive">
    <h2>おしごと詳細</h2>
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
    <?php echo $this->Html->link('エントリーする', ['controller' => 'JobEntries', 'action' => 'entry', $job['Job']['id'], 'label' => false]); ?>
</div>
