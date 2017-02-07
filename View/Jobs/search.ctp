<?php $this->assign('title', 'お仕事検索'); ?>
<?php echo $this->element('Jobs/header-setting'); ?>
<div class="container">
    <h1>お仕事検索</h1>
    <p>検索したいキーワードを入力してください</p>
    <?php echo $this->Form->create('Search', array('url' => 'index_front')); ?>
    <div class="form-group" style="width: 50%">
        <?php echo $this->Form->input('keyword', ['class' => 'form-control', 'label' => false]); ?>
    </div>
    <?= $this->Form->input('検索', ['action'=> 'index_front', 'type' => 'submit', 'class' => 'btn btn-primary', 'label' => false]); ?>
    <?php echo $this->Form->end(); ?>       
</div>