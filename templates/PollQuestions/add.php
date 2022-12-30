<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PollQuestion $pollQuestion
 * @var \Cake\Collection\CollectionInterface|string[] $pollRespondents
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Poll Questions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pollQuestions form content">
            <?= $this->Form->create($pollQuestion) ?>
            <fieldset>
                <legend><?= __('Add Poll Question') ?></legend>
                <?php
                    echo $this->Form->control('poll_respondent_id', ['options' => $pollRespondents]);
                    echo $this->Form->control('question_number');
                    echo $this->Form->control('answer');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
