<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">
        <!--Logo-->
        <a class="navbar-brand" href="<?= $this->Html->url("/")?>">BOOKWORK</a>
        <!--toggle button-->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-content">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>

    <!--menu-->
    <div id="nav-content" class="collapse navbar-collapse">  
        <ul class="nav navbar-nav">                   
            <li><?= $this->Html->link('このサイトについて', ['controller' => 'pages', 'action' => 'page1']); ?></li>
            <!--<li><?= $this->Html->link('Page2', ['controller' => 'pages', 'action' => 'page2']); ?></li>-->
            <!--<li><?= $this->Html->link('Page3', ['controller' => 'pages', 'action' => 'page3']); ?></li>-->
            <li><?= $this->Html->link('新着情報', ['controller' => 'notices', 'action' => 'index_front']); ?></li>
            <li><?= $this->Html->link('仕事検索', ['controller' => 'jobs', 'action' => 'index_front']); ?></li>
            <li><?= $this->Html->link('お問い合わせ', ['controller' => 'contacts', 'action' => 'contact']); ?></li>
        </ul>
             
        <ul class="nav navbar-nav navbar-right">
            <?php if ($currentUser) : ?>
                <li><?= $this->Html->link('管理画面へ', ['controller' => 'admins', 'action' => 'index']); ?></li>
            <?php else : ?>
                <li><?= $this->Html->link('ログイン', ['controller' => 'users', 'action' => 'login']); ?></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>