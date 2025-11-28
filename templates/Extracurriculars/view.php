<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Extracurricular $extracurricular
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Extracurricular'), ['action' => 'edit', $extracurricular->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Extracurricular'), ['action' => 'delete', $extracurricular->id], ['confirm' => __('Are you sure you want to delete # {0}?', $extracurricular->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Extracurriculars'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Extracurricular'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="extracurriculars view content">
            <h3><?= h($extracurricular->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($extracurricular->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $extracurricular->hasValue('user') ? $this->Html->link($extracurricular->user->email, ['controller' => 'Users', 'action' => 'view', $extracurricular->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Coach') ?></th>
                    <td><?= $extracurricular->hasValue('coach') ? $this->Html->link($extracurricular->coach->name, ['controller' => 'Coaches', 'action' => 'view', $extracurricular->coach->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($extracurricular->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($extracurricular->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($extracurricular->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Desc') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($extracurricular->desc)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Activities') ?></h4>
                <?php if (!empty($extracurricular->activities)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Desc') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Extracurricular Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($extracurricular->activities as $activity) : ?>
                        <tr>
                            <td><?= h($activity->id) ?></td>
                            <td><?= h($activity->name) ?></td>
                            <td><?= h($activity->desc) ?></td>
                            <td><?= h($activity->created) ?></td>
                            <td><?= h($activity->modified) ?></td>
                            <td><?= h($activity->extracurricular_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Activities', 'action' => 'view', $activity->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Activities', 'action' => 'edit', $activity->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Activities', 'action' => 'delete', $activity->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $activity->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Schedules') ?></h4>
                <?php if (!empty($extracurricular->schedules)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Time') ?></th>
                            <th><?= __('Day') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Extracurricular Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($extracurricular->schedules as $schedule) : ?>
                        <tr>
                            <td><?= h($schedule->id) ?></td>
                            <td><?= h($schedule->time) ?></td>
                            <td><?= h($schedule->day) ?></td>
                            <td><?= h($schedule->created) ?></td>
                            <td><?= h($schedule->modified) ?></td>
                            <td><?= h($schedule->extracurricular_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Schedules', 'action' => 'view', $schedule->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Schedules', 'action' => 'edit', $schedule->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Schedules', 'action' => 'delete', $schedule->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $schedule->id),
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