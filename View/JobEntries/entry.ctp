<?php $this->assign('title', 'エントリー'); ?>
<?php echo $this->element('Jobs/header-setting'); ?>

<div class="container">
    <h1>エントリー確認</h1>

    <!--<div class="table-responsive">-->
        <!--<table class="table table-striped">-->
            <!--style="width: 50%;"-->
            <!--        <tr>
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
                    </tr>-->
<!--            <tr>-->
            <h2 style="margin: 20px"><mark>▶ <?= h($job['Job']['title']); ?></mark></h2>
            <!--</tr>-->
    <!--        <tr>
                <td><strong>内容</strong></td>
                <td><?= $job_description; ?></td>
            </tr>-->

        <!--</table>-->
    <!--</div>-->
        <p>上記のお仕事にエントリーします。</p>
        <p>よろしければ下記フォームに名前とメールアドレスを入力してください。</p>
        <p>担当者にメールを送信します。</p>
        <hr>
        <?php echo $this->Form->create('JobEntry', ['novalidate' => true]); ?>
        <?php echo $this->Form->hidden('id', ['value' => $job['Job']['id']]); ?>
        <?php echo $this->Form->hidden('title', ['value' => $job['Job']['title']]); ?>
        <div class="form-group" style="width: 50%">
        <?php echo $this->Form->input('name', ['type' => 'text', 'class' => 'form-control', 'label' => 'お名前']); ?>
        </div>
        <div class="form-group" style="width: 50%">
        <?php echo $this->Form->input('email', ['type' => 'email', 'class' => 'form-control', 'label' => 'メールアドレス']); ?>
        </div>
        <?= $this->Form->input('確認する', ['action'=> 'entry_confirm', 'type' => 'submit', 'class' => 'btn btn-primary', 'label' => false]); ?>
        <?php // echo $this->Form->submit('入力内容を確認する', ['action' => 'entry_confirm', 'controller' => 'jobs', 'label' => false]); ?>
        <?php echo $this->Form->end(); ?>
</div>