<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Poll> $polls
 */
?>
<div class="polls index content">
    <?= $this->Html->link(__('New Poll'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Polls') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('date_poll') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($polls as $poll): ?>
                <tr>
                    <td><?= $this->Number->format($poll->id) ?></td>
                    <td><?= h($poll->date_poll) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $poll->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $poll->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $poll->id], ['confirm' => __('Are you sure you want to delete # {0}?', $poll->id)]) ?>
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
