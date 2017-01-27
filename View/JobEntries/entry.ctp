<div class="container">
    <h1>エントリー確認</h1>
    <div class="table-responsive">
        <table class="table table-striped">
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
            <tr>
                <td style="width: 20%"><strong>タイトル</strong></td>
                <td><?= h($job['Job']['title']); ?></td>
            </tr>
    <!--        <tr>
                <td><strong>内容</strong></td>
                <td><?= $job_description; ?></td>
            </tr>-->

        </table>
    </div>
        <p>上記のお仕事にエントリーします。</p>
        <p>よろしければ下記フォームに名前とメールアドレスを入力してください。</p>
        <p>担当者にメールを送信します。</p>

        <?php echo $this->Form->create('JobEntry', ['novalidate' => true]); ?>
        <?php echo $this->Form->hidden('id', ['value' => $job['Job']['id']]); ?>
        <?php echo $this->Form->hidden('title', ['value' => $job['Job']['title']]); ?>
        <?php echo $this->Form->input('name', ['type' => 'text', 'label' => 'お名前']); ?>
        <?php echo $this->Form->input('email', ['type' => 'email', 'label' => 'メールアドレス']); ?>
        <?php echo $this->Form->submit('入力内容を確認する', ['action' => 'entry_confirm', 'controller' => 'jobs', 'label' => false]); ?>
        <?php echo $this->Form->end(); ?>
</div>