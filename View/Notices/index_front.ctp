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
    <div class="row">
        <h1>お知らせ一覧</h1>
        <p>お知らせは最終更新日時順でソートされます。</p>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>掲載日</th>
                        <th>最終更新日</th>
                        <th>タイトル</th>

                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($notices as $notice) : ?>
                        <tr>
                            <td>
                                <?= $this->Time->format($notice['Notice']['created'], '%Y/%m/%d'); ?>
                            </td>

                            <td>
                                <?= $this->Time->format($notice['Notice']['modified'], '%Y/%m/%d'); ?>
                            </td>
                            <td>
                                <?= $this->Html->link(
                                    $notice['Notice']['subject'],
                                    ['action' => 'view_front', $notice['Notice']['id']]); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>


        <div style="text-align: center">                         
            <?= $this->element('pagination'); ?>                                        
        </div> 


    </div>
</div>