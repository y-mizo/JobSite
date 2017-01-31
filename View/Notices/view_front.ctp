<?php $this->assign('title', 'お知らせ'); ?>

<?php $this->start('css'); ?>
    <style>
        header.jumbotron {
            background-color: orange;
        }
    </style>
<?php $this->end(); ?>
    
<header class="jumbotron">
    <div class="container">
        <h1>Notices</h1>
    </div>
</header>

<div class="container">
    <h1><?= $notice['Notice']['subject']; ?></h1>
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
                <td><strong>内容</strong></td>
                <td><?= $notice_body; ?></td>
            </tr>
        </table>
    </div>
</div>