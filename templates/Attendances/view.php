<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Attendance $attendance
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Attendance'), ['action' => 'edit', $attendance->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Attendance'), ['action' => 'delete', $attendance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attendance->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Attendances'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Attendance'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="attendances view content">
            <h3><?= h($attendance->status) ?></h3>
            <table>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($attendance->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Schedule') ?></th>
                    <td><?= $attendance->hasValue('schedule') ? $this->Html->link($attendance->schedule->day, ['controller' => 'Schedules', 'action' => 'view', $attendance->schedule->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($attendance->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Users D') ?></th>
                    <td><?= $this->Number->format($attendance->users_d) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($attendance->date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($attendance->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($attendance->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Note') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($attendance->note)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>