<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Attendance> $attendances
 */
?>
<div class="attendances index content">
    <?= $this->Html->link(__('New Attendance'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Attendances') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('date') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('schedule_id') ?></th>
                    <th><?= $this->Paginator->sort('users_d') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($attendances as $attendance): ?>
                <tr>
                    <td><?= $this->Number->format($attendance->id) ?></td>
                    <td><?= h($attendance->status) ?></td>
                    <td><?= h($attendance->date) ?></td>
                    <td><?= h($attendance->created) ?></td>
                    <td><?= h($attendance->modified) ?></td>
                    <td><?= $attendance->hasValue('schedule') ? $this->Html->link($attendance->schedule->day, ['controller' => 'Schedules', 'action' => 'view', $attendance->schedule->id]) : '' ?></td>
                    <td><?= $this->Number->format($attendance->users_d) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $attendance->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $attendance->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $attendance->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $attendance->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>