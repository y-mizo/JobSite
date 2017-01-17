<?= $this->Form->create('Notice', ['novalidate' => true]); ?>

    <div class="form-group">
        <!--style="width: 50%;"-->
        <?= $this->Form->input('subject', ['label' => 'タイトル', 'class' => 'form-control']); ?> 
    </div>
    <div class="form-group">
        <!--style="width: 50%;"-->
        <?= $this->Form->input('body', ['label' => '内容', 'class' => 'form-control']); ?>
    </div>
    <?php if (!empty($this->request->data)) : ?>
        <?= $this->Form->hidden('id'); ?>
    <?php endif; ?>
<?= $this->Form->input($submitLabel, ['controller' => 'notices', 'action'=> 'add', 'type' => 'submit', 'class' => 'btn btn-primary', 'label' => false]); ?>
<?php echo $this->Form->end(); ?>
