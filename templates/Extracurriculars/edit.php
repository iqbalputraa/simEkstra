<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Extracurricular $extracurricular
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $coaches
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $extracurricular->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $extracurricular->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Extracurriculars'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="extracurriculars form content">
            <?= $this->Form->create($extracurricular) ?>
            <fieldset>
                <legend><?= __('Edit Extracurricular') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('desc');
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('coach_id', ['options' => $coaches]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
