<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="users view content">
            <h3><?= h($user->email) ?></h3>
            <table>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= h($user->role) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Verification') ?></th>
                    <td><?= $this->Number->format($user->verification) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($user->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Admins') ?></h4>
                <?php if (!empty($user->admins)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->admins as $admin) : ?>
                        <tr>
                            <td><?= h($admin->id) ?></td>
                            <td><?= h($admin->name) ?></td>
                            <td><?= h($admin->created) ?></td>
                            <td><?= h($admin->modified) ?></td>
                            <td><?= h($admin->user_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Admins', 'action' => 'view', $admin->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Admins', 'action' => 'edit', $admin->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Admins', 'action' => 'delete', $admin->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $admin->id),
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
                <h4><?= __('Related Coaches') ?></h4>
                <?php if (!empty($user->coaches)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->coaches as $coach) : ?>
                        <tr>
                            <td><?= h($coach->id) ?></td>
                            <td><?= h($coach->name) ?></td>
                            <td><?= h($coach->created) ?></td>
                            <td><?= h($coach->modified) ?></td>
                            <td><?= h($coach->user_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Coaches', 'action' => 'view', $coach->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Coaches', 'action' => 'edit', $coach->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Coaches', 'action' => 'delete', $coach->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $coach->id),
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
                <h4><?= __('Related Extracurriculars') ?></h4>
                <?php if (!empty($user->extracurriculars)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Desc') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Coach Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->extracurriculars as $extracurricular) : ?>
                        <tr>
                            <td><?= h($extracurricular->id) ?></td>
                            <td><?= h($extracurricular->name) ?></td>
                            <td><?= h($extracurricular->desc) ?></td>
                            <td><?= h($extracurricular->created) ?></td>
                            <td><?= h($extracurricular->modified) ?></td>
                            <td><?= h($extracurricular->user_id) ?></td>
                            <td><?= h($extracurricular->coach_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Extracurriculars', 'action' => 'view', $extracurricular->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Extracurriculars', 'action' => 'edit', $extracurricular->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Extracurriculars', 'action' => 'delete', $extracurricular->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $extracurricular->id),
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
                <h4><?= __('Related Informations') ?></h4>
                <?php if (!empty($user->informations)) : ?>
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
                        <?php foreach ($user->informations as $information) : ?>
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
            <div class="related">
                <h4><?= __('Related Students') ?></h4>
                <?php if (!empty($user->students)) : ?>
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
                        <?php foreach ($user->students as $student) : ?>
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