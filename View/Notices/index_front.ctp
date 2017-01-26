<?php $this->start('css'); ?>
<style>
    header.jumbotron {
        background-color: orange;
        /*background: url("../img/p2.jpg");*/
    }
</style>
<?= $this->Html->css('pages'); ?>
<?php $this->end(); ?>

<?php $this->start('title_area'); ?>
<h2>Notices</h2>
<?php $this->end(); ?>

<div class="container">
    <div class="row">
        <h2>お知らせ一覧</h2>
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