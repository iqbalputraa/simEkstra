<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Student $student
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $userGroups
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $student->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $student->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Students'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="students form content">
            <?= $this->Form->create($student) ?>
            <fieldset>
                <legend><?= __('Edit Student') ?></legend>
                <?php
                    echo $this->Form->control('nis');
                    echo $this->Form->control('name');
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('user_group_id', ['options' => $userGroups]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
