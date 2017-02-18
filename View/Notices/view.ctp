<h1>お知らせの詳細</h1>
<div class="actions">
    <ul class="list-inline text-right">
        <li><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $notice['Notice']['id']), ['class' => 'btn btn-warning']); ?></li>
        <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $notice['Notice']['id']), array('class' => 'btn btn-danger', 'confirm' => '本当に削除してもよろしいですか?')); ?></li>
    </ul>
</div>

<div class="table-responsive">
    <table class="table table-striped">
<!--style="width: 50%;"-->
        <tr>
            <td><strong>掲載日</strong></td>
            <td><?= h($notice['Notice']['created']); ?></td>
        </tr>
        <tr>
            <td><strong>最終更新日</strong></td>
            <td><?= h($notice['Notice']['modified']); ?></td>
        </tr>
        <tr>
            <td><strong>タイトル</strong></td>
            <td><?= h($notice['Notice']['subject']); ?></td>
        </tr>
        <tr>
            <td><strong>内容</strong></td>
            <td><?= $notice_body; ?></td>
        </tr>
    </table>
</div>