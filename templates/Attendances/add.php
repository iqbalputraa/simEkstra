<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Attendance $attendance
 * @var \Cake\Collection\CollectionInterface|string[] $schedules
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Attendances'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="attendances form content">
            <?= $this->Form->create($attendance) ?>
            <fieldset>
                <legend><?= __('Add Attendance') ?></legend>
                <?php
                    echo $this->Form->control('status');
                    echo $this->Form->control('date');
                    echo $this->Form->control('note');
                    echo $this->Form->control('schedule_id', ['options' => $schedules]);
                    echo $this->Form->control('users_d');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
