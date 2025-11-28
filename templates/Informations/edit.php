<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Information $information
 * @var string[]|\Cake\Collection\CollectionInterface $coaches
 * @var string[]|\Cake\Collection\CollectionInterface $admins
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $information->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $information->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Informations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="informations form content">
            <?= $this->Form->create($information) ?>
            <fieldset>
                <legend><?= __('Edit Information') ?></legend>
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
