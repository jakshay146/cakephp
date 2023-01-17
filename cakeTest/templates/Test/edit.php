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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $test->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $test->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Test'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="test form content">
            <?= $this->Form->create($test) ?>
            <fieldset>
                <legend><?= __('Edit Test') ?></legend>
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
