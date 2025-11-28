<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Extracurricular> $extracurriculars
 */
?>
<div class="extracurriculars index content">
    <?= $this->Html->link(__('New Extracurricular'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Extracurriculars') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('coach_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($extracurriculars as $extracurricular): ?>
                <tr>
                    <td><?= $this->Number->format($extracurricular->id) ?></td>
                    <td><?= h($extracurricular->name) ?></td>
                    <td><?= h($extracurricular->created) ?></td>
                    <td><?= h($extracurricular->modified) ?></td>
                    <td><?= $extracurricular->hasValue('user') ? $this->Html->link($extracurricular->user->email, ['controller' => 'Users', 'action' => 'view', $extracurricular->user->id]) : '' ?></td>
                    <td><?= $extracurricular->hasValue('coach') ? $this->Html->link($extracurricular->coach->name, ['controller' => 'Coaches', 'action' => 'view', $extracurricular->coach->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $extracurricular->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $extracurricular->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $extracurricular->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $extracurricular->id),
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