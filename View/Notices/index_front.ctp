<?php $this->assign('title', 'お知らせ'); ?>

<?php $this->start('css'); ?>
<style>
    header.jumbotron {
        background-color: #FF8856;
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
        <div class="col-sm-12">
            <?php foreach ($notices as $notice) : ?>

                <p><?= $this->Time->format(h($notice['Notice']['created']), '%Y/%m/%d'); ?></p>

                <?php // echo $this->Time->format($notice['Notice']['modified'], '%Y/%m/%d'); ?>

                <?php
                // echo $this->Html->link(
//                                    $notice['Notice']['subject'],
//                                    ['action' => 'view_front', $notice['Notice']['id']]); 
                ?>

                <p style="font-size: 20px"><strong><?= $notice['Notice']['subject']; ?></strong></p>

                <p><?= nl2br(h($notice['Notice']['body'])) ?></p><br><br>

            <?php endforeach; ?>


            <div style="text-align: center">                         
            <?= $this->element('pagination'); ?>                                        
            </div> 

        </div>
    </div>
</div>