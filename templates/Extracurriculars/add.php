<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Extracurricular $extracurricular
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $coaches
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Extracurriculars'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="extracurriculars form content">
            <?= $this->Form->create($extracurricular) ?>
            <fieldset>
                <legend><?= __('Add Extracurricular') ?></legend>
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
