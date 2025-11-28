<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserGroup $userGroup
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User Group'), ['action' => 'edit', $userGroup->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User Group'), ['action' => 'delete', $userGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userGroup->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List User Groups'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User Group'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="userGroups view content">
            <h3><?= h($userGroup->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($userGroup->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Group Name') ?></th>
                    <td><?= $this->Number->format($userGroup->group_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($userGroup->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($userGroup->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Students') ?></h4>
                <?php if (!empty($userGroup->students)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nis') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('User Group Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($userGroup->students as $student) : ?>
                        <tr>
                            <td><?= h($student->id) ?></td>
                            <td><?= h($student->nis) ?></td>
                            <td><?= h($student->name) ?></td>
                            <td><?= h($student->created) ?></td>
                            <td><?= h($student->modified) ?></td>
                            <td><?= h($student->user_id) ?></td>
                            <td><?= h($student->user_group_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Students', 'action' => 'view', $student->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Students', 'action' => 'edit', $student->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Students', 'action' => 'delete', $student->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $student->id),
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