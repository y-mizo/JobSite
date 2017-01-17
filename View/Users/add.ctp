<head>
    <title>
        <?php $this->assign('title', 'add'); ?>
    </title>
</head>

<div class="row">  
    <div class="col-md-4 col-md-offset-4">  
        <?= $this->element('Users/form', ['submitLabel' => 'Submit', 'legend' => 'Add user']); ?>
    </div>
</div>