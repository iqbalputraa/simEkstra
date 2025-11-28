<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Admin $admin
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Admin'), ['action' => 'edit', $admin->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Admin'), ['action' => 'delete', $admin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $admin->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Admins'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Admin'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="admins view content">
            <h3><?= h($admin->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($admin->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $admin->hasValue('user') ? $this->Html->link($admin->user->email, ['controller' => 'Users', 'action' => 'view', $admin->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($admin->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($admin->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($admin->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Informations') ?></h4>
                <?php if (!empty($admin->informations)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Coach Id') ?></th>
                            <th><?= __('Admin Id') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Date') ?></th>
                            <th><?= __('Information') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($admin->informations as $information) : ?>
                        <tr>
                            <td><?= h($information->id) ?></td>
                            <td><?= h($information->coach_id) ?></td>
                            <td><?= h($information->admin_id) ?></td>
                            <td><?= h($information->title) ?></td>
                            <td><?= h($information->date) ?></td>
                            <td><?= h($information->information) ?></td>
                            <td><?= h($information->created) ?></td>
                            <td><?= h($information->modified) ?></td>
                            <td><?= h($information->user_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Informations', 'action' => 'view', $information->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Informations', 'action' => 'edit', $information->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Informations', 'action' => 'delete', $information->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $information->id),
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