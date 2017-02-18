<?php $this->assign('title', 'トップページ'); ?>

<?php $this->start('css'); ?>
<style>
    header.jumbotron {
        /*background: url("../img/books2.jpg");*/
        /*background-color: gold;*/
        /*height: 100vh;*/
    }
    body {
        text-align: center;
    }
</style>
<?php $this->end(); ?>

<header class="jumbotron top">
    <div class="container">
        <img src="http://mizo.xsrv.jp/JobSite/webroot/img/bookb.png" style="width: 50%">
        <h1><span><strong>本と、はたらく。</strong></span></h1>
        <p><span style="border-bottom:solid 5px red;"><strong>本好きの人のための求人サイト</strong></span></p>
        <!--style="background-color:black"-->
    </div>
</header>

<div class="container-fluid news">
    <div class="row">
        <h2><strong>新着のお仕事</strong></h2><br>
        <?php foreach ($jobs as $job) : ?>
            <h4><strong><span style="background-color: yellow">NEW!</span><?php echo $this->Html->link(h($job['Job']['title']), ['controller' => 'Jobs', 'action' => 'view_front', $job['Job']['id']]) ?></strong></h4><br>
        <?php endforeach; ?>  
    </div>
</div>

<div class="container-fluid marketing">
    <!--Three columns of text below the carousel--> 
    <div class="row">
        <div class="col-lg-4">
            <!--<img class="img-circle" src="../img/writing.jpg" alt="" width="200" height="200">-->
            <h2><strong><i class="fa fa-pencil fa-4x" aria-hidden="true" style="color: red;"></i><br>WRITER</strong></h2>
            <!--<i class="fa fa-pencil fa-5x" aria-hidden="true"></i>-->
            <p>文章を書くことが好きなら、<br>ライターや編集、校正のお仕事がおすすめです。</p>
        </div> <!--/.col-lg-4--> 

        <div class="col-lg-4">
            <!--<img class="img-circle" src="../img/palette.jpg" alt="" width="200" height="200">-->
            <h2><strong><i class="fa fa-television fa-4x" aria-hidden="true" style="color: red;"></i><br>DESIGNER</strong></h2>
            <p>デザインや絵を書くことが好きなら、<br>装丁画家や紙面構成、印刷所でのお仕事がおすすめです。</p>
        </div> <!--/.col-lg-4--> 

        <div class="col-lg-4">
            <!--<img class="img-circle" src="../img/clerk.jpg" alt="" width="200" height="200">-->
            <h2><strong><i class="fa fa-smile-o  fa-4x" aria-hidden="true" style="color: red;"></i><br>CLERK</strong></h2>
            <p>人とコミュニケーションを取ることが好きなら、<br>書店や図書館、営業などのお仕事がおすすめです。</p>
        </div> <!--/.col-lg-4-->         
    </div> <!--/.row--> 
</div>

<div class="container">
    <?php echo $this->Html->link('さっそく検索する !', ['controller' => 'Jobs', 'action' => 'index_front'], ['class' => 'btn btn-success btn-lg']); ?></p>
</div>

