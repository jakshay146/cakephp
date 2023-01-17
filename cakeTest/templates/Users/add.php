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
            <?= $this->Form->create($user, ['type'=>'file']) ?>
            <fieldset>
                <legend><?= __('Add User') ?></legend>
                <?php
                    echo $this->Form->control('first_name' , ['required' => false]);
                    echo $this->Form->control('last_name', ['required' => false]);
                    echo $this->Form->control('email', ['required' => false,'type'=>'text','autocomplete'=>'off']);
                    echo $this->Form->control('phone_number', ['required' => false]);
                    echo $this->Form->control('password', ['required' => false,'id'=>'password']);
                    echo $this->Form->control('confirm_password', ['required' => false,'type'=>'password']);
                    echo $this->Form->control('profile.role', ['required' => false]);
                    echo $this->Form->control('profile.city', ['required' => false]);
                    
                    //echo $this->Form->control('gender');
                    echo "<label>Gender</label>";
                    //  echo $this->Form->radio('gender', [['value' => 'male', 'text' => 'male'], ['value' => 'female', 'text' => 'female']], ['label' => 'Gender'],['required'=>false]);
                    
                    $options = array(
                        'required' => false,
                        'type' => 'radio',
                        'label' => true,
                        'div' => array('class' => 'btn-group', 'data-toggle' => 'buttons'),
                        'class' => 'required',
                       // 'default'=> 'male',
                        'before' => '<label class="btn btn-primary">',
                        'separator' => '</label><label class="btn btn-primary">',
                        'after' => '</label>',
                        'options' => array('male' => 'male', 'female' => 'female'),
                    );
                    echo $this->Form->input('gender', $options);

                    echo $this->Form->control('images', ['type'=>'file']);
                    
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
