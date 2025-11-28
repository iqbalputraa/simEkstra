<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Activity> $activities
 */
?>
<div class="activities index content">
    <?= $this->Html->link(__('New Activity'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Activities') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('extracurricular_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($activities as $activity): ?>
                <tr>
                    <td><?= $this->Number->format($activity->id) ?></td>
                    <td><?= h($activity->name) ?></td>
                    <td><?= h($activity->created) ?></td>
                    <td><?= h($activity->modified) ?></td>
                    <td><?= $activity->hasValue('extracurricular') ? $this->Html->link($activity->extracurricular->name, ['controller' => 'Extracurriculars', 'action' => 'view', $activity->extracurricular->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $activity->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $activity->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $activity->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $activity->id),
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