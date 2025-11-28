<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Coach $coach
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Coach'), ['action' => 'edit', $coach->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Coach'), ['action' => 'delete', $coach->id], ['confirm' => __('Are you sure you want to delete # {0}?', $coach->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Coaches'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Coach'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="coaches view content">
            <h3><?= h($coach->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($coach->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $coach->hasValue('user') ? $this->Html->link($coach->user->email, ['controller' => 'Users', 'action' => 'view', $coach->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($coach->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($coach->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($coach->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Extracurriculars') ?></h4>
                <?php if (!empty($coach->extracurriculars)) : ?>
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
                        <?php foreach ($coach->extracurriculars as $extracurricular) : ?>
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
                <?php if (!empty($coach->informations)) : ?>
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
                        <?php foreach ($coach->informations as $information) : ?>
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