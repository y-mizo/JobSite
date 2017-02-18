<?= $this->Form->create('Job', ['novalidate' => true]); ?>

    <div class="form-group">
        <!--style="width: 50%;"-->
        <?= $this->Form->input('title', ['label' => 'タイトル', 'class' => 'form-control']); ?> 
    </div>
    <div class="form-group">
        <!--style="width: 50%;"-->
        <?= $this->Form->input('company_name', ['label' => '社名', 'class' => 'form-control']); ?>
    </div>
    <div class="form-group">
        <!--style="width: 50%;"-->
        <?php // $this->Form->input('category_id', ['label' => 'カテゴリ', 'class' => 'form-control']); ?>
        <?php echo $this->Form->input( 'category_id', array( 
            'type' => 'select', 
            'options' => $category_list
            )); ?>
    </div>
    <div class="form-group">
        <!--style="width: 50%;"-->
        <?= $this->Form->input('requirement', ['label' => '応募要項', 'class' => 'form-control']); ?>
    </div>
    <div class="form-group">
        <!--style="width: 50%;"-->
        <?= $this->Form->input('income', ['label' => '年収', 'class' => 'form-control']); ?>
    </div>
    <div class="form-group">
        <!--style="width: 50%;"-->
        <?= $this->Form->input('location', ['label' => '勤務地', 'class' => 'form-control']); ?>
    </div>
    <div class="form-group">
        <!--style="width: 50%;"-->
        <?= $this->Form->input('description', ['label' => '内容', 'class' => 'form-control']); ?>
    </div>
    <?php if (!empty($this->request->data)) : ?>
        <?php echo $this->Form->hidden('id'); ?>
    <?php endif; ?>
<?php echo $this->Form->input($submitLabel, ['controller' => 'Jobs', 'action'=> 'add', 'type' => 'submit', 'class' => 'btn btn-primary', 'label' => false]); ?>
<?php echo $this->Form->end(); ?>
