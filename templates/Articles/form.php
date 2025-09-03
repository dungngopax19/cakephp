<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 * @var \Cake\Collection\CollectionInterface|array $users
 * @var \Cake\Collection\CollectionInterface|array $tags
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Articles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="articles form content">
            <?= $this->Form->create($article) ?>
            <fieldset>
                <legend><?= $article->isNew() ? __('Add Article') : __('Edit Article') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('title');
                    echo $this->Form->control('slug', ['help' => __('Leave empty to auto-generate from title')]);
                    echo $this->Form->control('body', ['type' => 'textarea']);
                    echo $this->Form->control('published', ['type' => 'checkbox']);
                    echo $this->Form->control('tags._ids', ['options' => $tags, 'multiple' => 'checkbox']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
