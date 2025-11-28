<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Schedule $schedule
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Schedule'), ['action' => 'edit', $schedule->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Schedule'), ['action' => 'delete', $schedule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $schedule->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Schedules'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Schedule'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="schedules view content">
            <h3><?= h($schedule->day) ?></h3>
            <table>
                <tr>
                    <th><?= __('Day') ?></th>
                    <td><?= h($schedule->day) ?></td>
                </tr>
                <tr>
                    <th><?= __('Extracurricular') ?></th>
                    <td><?= $schedule->hasValue('extracurricular') ? $this->Html->link($schedule->extracurricular->name, ['controller' => 'Extracurriculars', 'action' => 'view', $schedule->extracurricular->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($schedule->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Time') ?></th>
                    <td><?= h($schedule->time) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($schedule->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($schedule->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Attendances') ?></h4>
                <?php if (!empty($schedule->attendances)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Date') ?></th>
                            <th><?= __('Note') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Schedule Id') ?></th>
                            <th><?= __('Users D') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($schedule->attendances as $attendance) : ?>
                        <tr>
                            <td><?= h($attendance->id) ?></td>
                            <td><?= h($attendance->status) ?></td>
                            <td><?= h($attendance->date) ?></td>
                            <td><?= h($attendance->note) ?></td>
                            <td><?= h($attendance->created) ?></td>
                            <td><?= h($attendance->modified) ?></td>
                            <td><?= h($attendance->schedule_id) ?></td>
                            <td><?= h($attendance->users_d) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Attendances', 'action' => 'view', $attendance->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Attendances', 'action' => 'edit', $attendance->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Attendances', 'action' => 'delete', $attendance->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $attendance->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>