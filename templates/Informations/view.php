<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Information $information
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Information'), ['action' => 'edit', $information->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Information'), ['action' => 'delete', $information->id], ['confirm' => __('Are you sure you want to delete # {0}?', $information->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Informations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Information'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="informations view content">
            <h3><?= h($information->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Coach') ?></th>
                    <td><?= $information->hasValue('coach') ? $this->Html->link($information->coach->name, ['controller' => 'Coaches', 'action' => 'view', $information->coach->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Admin') ?></th>
                    <td><?= $information->hasValue('admin') ? $this->Html->link($information->admin->name, ['controller' => 'Admins', 'action' => 'view', $information->admin->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($information->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $information->hasValue('user') ? $this->Html->link($information->user->email, ['controller' => 'Users', 'action' => 'view', $information->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($information->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= $this->Number->format($information->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($information->date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($information->created) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Information') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($information->information)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>