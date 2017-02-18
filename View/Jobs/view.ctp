<h1>お仕事の詳細</h1>
<div class="actions">
    <ul class="list-inline text-right">
        <li><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $job['Job']['id']), ['class' => 'btn btn-warning']); ?></li>
        <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $job['Job']['id']), array('class' => 'btn btn-danger', 'confirm' => '本当に削除してもよろしいですか?')); ?></li>
    </ul>
</div>

<div class="table-responsive">
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
            <td><strong>応募要項</strong></td>
            <td><?= h($job['Job']['requirement']); ?></td>
        </tr>
        <tr>
            <td><strong>勤務地</strong></td>
            <td><?= h($job['Job']['location']); ?></td>
        <tr>
            <td><strong>年収</strong></td>
            <td><?= h($job['Job']['income']); ?></td>
        </tr>
        <tr>
            <td><strong>内容</strong></td>
            <td><?= $job_description; ?></td>
        </tr>

</table>
</div>