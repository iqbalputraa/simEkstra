<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Activity $activity
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Activity'), ['action' => 'edit', $activity->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Activity'), ['action' => 'delete', $activity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $activity->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Activities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Activity'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="activities view content">
            <h3><?= h($activity->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($activity->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Extracurricular') ?></th>
                    <td><?= $activity->hasValue('extracurricular') ? $this->Html->link($activity->extracurricular->name, ['controller' => 'Extracurriculars', 'action' => 'view', $activity->extracurricular->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($activity->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($activity->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($activity->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Desc') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($activity->desc)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Images') ?></h4>
                <?php if (!empty($activity->images)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Image') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Activity Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($activity->images as $image) : ?>
                        <tr>
                            <td><?= h($image->id) ?></td>
                            <td><?= h($image->image) ?></td>
                            <td><?= h($image->created) ?></td>
                            <td><?= h($image->modified) ?></td>
                            <td><?= h($image->activity_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Images', 'action' => 'view', $image->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Images', 'action' => 'edit', $image->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Images', 'action' => 'delete', $image->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $image->id),
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