<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Information $information
 * @var \Cake\Collection\CollectionInterface|string[] $coaches
 * @var \Cake\Collection\CollectionInterface|string[] $admins
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Informations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="informations form content">
            <?= $this->Form->create($information) ?>
            <fieldset>
                <legend><?= __('Add Information') ?></legend>
                <?php
                    echo $this->Form->control('coach_id', ['options' => $coaches, 'empty' => true]);
                    echo $this->Form->control('admin_id', ['options' => $admins, 'empty' => true]);
                    echo $this->Form->control('title');
                    echo $this->Form->control('date');
                    echo $this->Form->control('information');
                    echo $this->Form->control('user_id', ['options' => $users]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
