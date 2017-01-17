<head>
    <title>
        <?php $this->assign('title', 'view'); ?>
    </title>
</head>

<h2><?php echo __('About User'); ?></h2>
<div class="actions">
    <ul class="list-inline text-right">
        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id']), ['class' => 'btn btn-warning btn-info']); ?>
        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array('class' => 'btn btn-primary btn-danger', 'confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?>
        <!--<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>-->
        <!--<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?> </li>-->
        <!--<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>-->
        <!--<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>-->
    </ul>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <tr>
            <td><?php echo __('Id'); ?><td>
            <td>
                <?php echo h($user['User']['id']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Username'); ?><td>
            <td>
                <?php echo h($user['User']['username']); ?>
                &nbsp;
            </td>
        </tr>

<!--        <td><?php echo __('Password'); ?><td>
<td>
        <?php echo h($user['User']['password']); ?>
    &nbsp;
<td>-->
        <tr>

            <td><?php echo __('Email'); ?><td>
            <td>
                <?php echo h($user['User']['email']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Role'); ?><td>
            <td>
                <?php echo h($user['User']['role']); ?>
                &nbsp;
            </td>

        </tr>
        <tr>
            <td><?php echo __('Created'); ?><td>
            <td>
                <?php echo h($user['User']['created']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Modified'); ?><td>
            <td>
                <?php echo h($user['User']['modified']); ?>
                &nbsp;
            </td>
        </tr>
    </table>

</div>



