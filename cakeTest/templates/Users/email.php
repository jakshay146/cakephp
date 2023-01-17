<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->Breadcrumbs->add([
    ['title' => 'listing page', 'url' => ['controller' => 'Users', 'action' => 'index']],
    ['title' => 'add', 'url' => ['controller' => 'Users', 'action' => 'add']]
]);
?>
<?php echo $cell = $this->cell('Inbox'); ?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <?php 
        //    echo $this->breadcrumbs->add('users',['users','index']);
        echo $this->Breadcrumbs->render();
            
            ?>
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create() ?>
            <fieldset>
                <legend><?= __('send mail') ?></legend>
                <?php
               
                    echo $this->Form->control('email');
                 
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
