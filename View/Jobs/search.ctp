<div class="container">
    <h1>お仕事のタイトル検索</h1>
    <?php
    echo $this->Form->create('Search', array('url' => 'index_front'));
    echo $this->Form->input('keyword', ['label' => false]);
    echo $this->Form->end('検索');
    ?>
</div>