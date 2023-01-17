<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $test
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Test'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="test form content">
            <?= $this->Form->create($test) ?>
            <fieldset>
                <legend><?= __('Add Test') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('password');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
