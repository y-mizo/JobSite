<?php $this->start('css'); ?>
<style>
    header.jumbotron {
        background: url("../img/main.jpg");}
</style>
<?= $this->Html->css('top'); ?>

<?php $this->end(); ?>


<?php $this->assign('title', 'Top'); ?>
<?php $this->start('title_area'); ?>
<h1>SiteBase</h1>
<p>ログインを必要とするサイトの雛形サイト(お知らせページつき)</p>
<?php $this->end(); ?>


<div class="container marketing">
    <!--Three columns of text below the carousel--> 
    <div class="row">
        
        <div class="col-lg-4">
            <img class="img-circle" src="../img/head1.jpg" alt="" width="140" height="140">
            <h2>Heading</h2>
            <p>text area text area text area text area text area text area text area text area text area text area </p>
        </div> <!--/.col-lg-4--> 
        
        <div class="col-lg-4">
            <img class="img-circle" src="../img/head2.jpg" alt="" width="140" height="140">
            <h2>Heading2</h2>
            <p>text area text area text area text area text area text area text area text area text area text area </p>
        </div> <!--/.col-lg-4--> 
        
        <div class="col-lg-4">
            <img class="img-circle" src="../img/head3.jpg" alt="" width="140" height="140">
            <h2>Heading3</h2>
            <p>text area text area text area text area text area text area text area text area text area text area </p>
        </div> <!--/.col-lg-4--> 
        
    </div> <!--/.row--> 

<?php $this->end(); ?>

