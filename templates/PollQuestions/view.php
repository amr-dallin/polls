<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PollQuestion $pollQuestion
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Poll Question'), ['action' => 'edit', $pollQuestion->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Poll Question'), ['action' => 'delete', $pollQuestion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pollQuestion->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Poll Questions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Poll Question'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pollQuestions view content">
            <h3><?= h($pollQuestion->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Poll Respondent') ?></th>
                    <td><?= $pollQuestion->has('poll_respondent') ? $this->Html->link($pollQuestion->poll_respondent->id, ['controller' => 'PollRespondents', 'action' => 'view', $pollQuestion->poll_respondent->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($pollQuestion->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Question Number') ?></th>
                    <td><?= $this->Number->format($pollQuestion->question_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Answer') ?></th>
                    <td><?= $pollQuestion->answer ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
