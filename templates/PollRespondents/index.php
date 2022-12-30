<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\PollRespondent> $pollRespondents
 */
?>
<div class="pollRespondents index content">
    <?= $this->Html->link(__('New Poll Respondent'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Poll Respondents') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('poll_id') ?></th>
                    <th><?= $this->Paginator->sort('full_name') ?></th>
                    <th><?= $this->Paginator->sort('gender') ?></th>
                    <th><?= $this->Paginator->sort('date_of_birth') ?></th>
                    <th><?= $this->Paginator->sort('year_of_admission') ?></th>
                    <th><?= $this->Paginator->sort('faculty') ?></th>
                    <th><?= $this->Paginator->sort('language') ?></th>
                    <th><?= $this->Paginator->sort('group_symbol') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pollRespondents as $pollRespondent): ?>
                <tr>
                    <td><?= $this->Number->format($pollRespondent->id) ?></td>
                    <td><?= $pollRespondent->has('poll') ? $this->Html->link($pollRespondent->poll->id, ['controller' => 'Polls', 'action' => 'view', $pollRespondent->poll->id]) : '' ?></td>
                    <td><?= h($pollRespondent->full_name) ?></td>
                    <td><?= h($pollRespondent->gender) ?></td>
                    <td><?= h($pollRespondent->date_of_birth) ?></td>
                    <td><?= h($pollRespondent->year_of_admission) ?></td>
                    <td><?= h($pollRespondent->faculty) ?></td>
                    <td><?= h($pollRespondent->language) ?></td>
                    <td><?= h($pollRespondent->group_symbol) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $pollRespondent->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pollRespondent->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pollRespondent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pollRespondent->id)]) ?>
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
