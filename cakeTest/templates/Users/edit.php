<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->Breadcrumbs->add([
    ['title' => 'listing page', 'url' => ['controller' => 'Users', 'action' => 'index']],
    ['title' => 'edit', 'url' => ['controller' => 'Users', 'action' => 'edit']]
]);
?>
<div class="row">
<?php 
        //    echo $this->breadcrumbs->add('users',['users','index']);
        echo $this->Breadcrumbs->render();
            
            ?>
    <aside class="column">
        <div class="side-nav">

            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->user_id,],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->user_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user, ['enctype' => 'multipart/form-data']) ?>
            <fieldset>
                <legend><?= __('Edit User') ?></legend>
                <?php
                
                    echo $this->Form->control('first_name');
                    echo $this->Form->control('last_name');
                    echo $this->Form->control('email');
                    echo $this->Form->control('phone_number');
                    // echo $this->Form->control('password');
                    echo $this->Form->control('gender');
                    
                    echo $this->Form->control('change_image', ['type'=>'file']);

                    //echo "<input type='file' name='change_image'  src='".h($user->image)."' />";


                    echo $this->Html->image($user->image);
                    // echo $this->Form->control('created_date');
                    // echo $this->Form->control('modified_date');
                    // echo $this->Form->control('token');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
