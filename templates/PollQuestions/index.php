<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\PollQuestion> $pollQuestions
 */
?>
<div class="pollQuestions index content">
    <?= $this->Html->link(__('New Poll Question'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Poll Questions') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('poll_respondent_id') ?></th>
                    <th><?= $this->Paginator->sort('question_number') ?></th>
                    <th><?= $this->Paginator->sort('answer') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pollQuestions as $pollQuestion): ?>
                <tr>
                    <td><?= $this->Number->format($pollQuestion->id) ?></td>
                    <td><?= $pollQuestion->has('poll_respondent') ? $this->Html->link($pollQuestion->poll_respondent->id, ['controller' => 'PollRespondents', 'action' => 'view', $pollQuestion->poll_respondent->id]) : '' ?></td>
                    <td><?= $this->Number->format($pollQuestion->question_number) ?></td>
                    <td><?= h($pollQuestion->answer) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $pollQuestion->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pollQuestion->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pollQuestion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pollQuestion->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
