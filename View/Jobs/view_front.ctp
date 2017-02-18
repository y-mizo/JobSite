<?php $this->assign('title', 'お仕事情報詳細'); ?>
<?php echo $this->element('Jobs/header-setting'); ?>

<div class="container">
    <div class="row">
        <h1><strong>▶ <?= h($job['Job']['title']); ?></strong></h1>
            <div class="table-responsive jobtable">
            <table class="table">
                <tbody> 
                    <tr>
                        <td class="text-right"  colspan="2">
                            登録日：<?= $this->Time->format($job['Job']['created'], '%Y/%m/%d'); ?>
                            最終更新日：<?= $this->Time->format($job['Job']['modified'], '%Y/%m/%d'); ?>
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
                    <tr>
                        <td>仕事内容：<br><?= nl2br(h($job['Job']['description'])); ?></td>
                    </tr>

                </tbody>
            </table>
        </div>
        <p class="list-inline text-center">
            <?php echo $this->Html->link('このお仕事にエントリーする', ['controller' => 'JobEntries', 'action' => 'entry', $job['Job']['id']], ['class' => 'btn btn-success btn-lg']); ?></p>
    </div>
</div>