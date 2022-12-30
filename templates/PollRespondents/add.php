<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PollRespondent $pollRespondent
 * @var \Cake\Collection\CollectionInterface|string[] $polls
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Poll Respondents'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pollRespondents form content">
            <?= $this->Form->create($pollRespondent) ?>
            <fieldset>
                <legend><?= __('Add Poll Respondent') ?></legend>
                <?php
                    echo $this->Form->control('poll_id', ['options' => $polls]);
                    echo $this->Form->control('full_name');
                    echo $this->Form->control('gender');
                    echo $this->Form->control('date_of_birth');
                    echo $this->Form->control('year_of_admission');
                    echo $this->Form->control('faculty');
                    echo $this->Form->control('language');
                    echo $this->Form->control('group_symbol');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
