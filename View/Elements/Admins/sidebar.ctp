<ul class="nav nav-sidebar">
    <li><?php echo $this->Html->link('ユーザ一覧', array('controller' => 'users', 'action' => 'index')); ?></li>
    <li><?php echo $this->Html->link('お知らせ一覧', array('controller' => 'notices', 'action' => 'index')); ?></li>
    <li><?php echo $this->Html->link('お仕事一覧', array('controller' => 'jobs', 'action' => 'index')); ?></li>
    <?php if ($currentUser['role'] === 'admin') : ?>
        <li><?php echo $this->Html->link('お仕事カテゴリ一覧', array('controller' => 'categories', 'action' => 'index')); ?></li>
    <?php endif; ?>
</ul>

