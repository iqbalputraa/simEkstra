<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Image $image
 * @var \Cake\Collection\CollectionInterface|string[] $activities
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Images'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="images form content">
            <?= $this->Form->create($image,['type'=>'file']) ?>
            <fieldset>
                <legend><?= __('Add Image') ?></legend>
                <?php
                    echo $this->Form->control('image',['type'=>'file']);
                    echo $this->Form->control('activity_id', ['options' => $activities]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
