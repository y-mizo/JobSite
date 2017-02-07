<nav class="navbar navbar-inverse navbar-fixed-top">

    <div class="navbar-header">
        <!--Logo-->
        <a class="navbar-brand" href="/">JobSite</a>
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
            <li><?= $this->Html->link('管理画面トップ', ['controller' => 'admins', 'action' => 'index']); ?></li>
        </ul>
        <!--dropdown list-->                  
        <ul class="nav navbar-nav navbar-right">    
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $currentUser['username'] ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <!--<li>$this->Html->link('Admin Page', ['controller' => 'admins', 'action' => 'index']);</li>-->
                        <li><?= $this->Html->link('パスワード変更', ['controller' => 'users', 'action' => 'changePassword']); ?></li>
                        <li class="divider"></li>
                        <li><?= $this->Html->link('ログアウト', ['controller' => 'users', 'action' => 'logout']); ?></li>
                    </ul>   
                </li>
        </ul>
    </div>
</nav>