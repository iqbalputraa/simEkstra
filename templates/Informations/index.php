<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Information> $informations
 */
?>
<div class="informations index content">
    <?= $this->Html->link(__('New Information'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Informations') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('coach_id') ?></th>
                    <th><?= $this->Paginator->sort('admin_id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('date') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($informations as $information): ?>
                <tr>
                    <td><?= $this->Number->format($information->id) ?></td>
                    <td><?= $information->hasValue('coach') ? $this->Html->link($information->coach->name, ['controller' => 'Coaches', 'action' => 'view', $information->coach->id]) : '' ?></td>
                    <td><?= $information->hasValue('admin') ? $this->Html->link($information->admin->name, ['controller' => 'Admins', 'action' => 'view', $information->admin->id]) : '' ?></td>
                    <td><?= h($information->title) ?></td>
                    <td><?= h($information->date) ?></td>
                    <td><?= h($information->created) ?></td>
                    <td><?= $this->Number->format($information->modified) ?></td>
                    <td><?= $information->hasValue('user') ? $this->Html->link($information->user->email, ['controller' => 'Users', 'action' => 'view', $information->user->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $information->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $information->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $information->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $information->id),
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