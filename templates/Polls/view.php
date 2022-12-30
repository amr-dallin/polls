<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Poll $poll
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Poll'), ['action' => 'edit', $poll->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Poll'), ['action' => 'delete', $poll->id], ['confirm' => __('Are you sure you want to delete # {0}?', $poll->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Polls'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Poll'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="polls view content">
            <table>
                <tr>
                    <th><?= __('Date Poll') ?></th>
                    <td><?= $poll->date_poll->format('d.m.Y') ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Notes') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($poll->notes)); ?>
                </blockquote>
            </div>
            <hr/>
            <div class="related">
                <?php if (!empty($poll->poll_respondents)): ?>

                    <?php
                    $respondents = [];
                    foreach($poll->poll_respondents as $pollRespondent) {
                        switch ($pollRespondent->faculty) {
                            case '1':
                                $faculty = 'Дошкольное образование (дневное)';
                                break;
                            case '2':
                                $faculty = 'Дошкольное образование (вечернее)';
                                break;
                            case '3':
                                $faculty = 'Корейский язык и менеджмент';
                                break;
                            case '4':
                                $faculty = 'Архитектура';
                                break;
                            case '5':
                                $faculty = 'Диетология и нутрициология';
                                break;
                            case '6':
                                $faculty = 'Информационные технологии';
                                break;
                            case '7':
                                $faculty = 'Электронный бизнес';
                                break;
                            case '8':
                                $faculty = 'Мультимедия и игровой контент';
                                break;
                        }
                        $groupTitle = $pollRespondent->faculty . $pollRespondent->language . substr($pollRespondent->year_of_admission, -2) . $pollRespondent->group_symbol;
                        $respondents[$pollRespondent->year_of_admission][$faculty][$groupTitle][] = $pollRespondent;
                    }
                    ?>

                    <?php foreach($respondents as $yearOfAdmission => $faculties): ?>
                        <h2><?= $yearOfAdmission ?></h2>
                        <div style="padding: 10px; background-color: azure; margin-bottom: 20px;">
                            <?php foreach($faculties as $facultyTitle => $groups): ?>
                                <h3><?= $facultyTitle ?></h3>
                                <div style="padding: 10px; background-color: beige; margin-bottom: 20px;">
                                    <?php foreach($groups as $groupTitle => $pollRespondents): ?>
                                        <h4><?= $groupTitle ?></h4>
                                        <div class="table-responsive" style="padding: 10px; background-color: bisque; margin-bottom: 20px;">
                                            <table>
                                                <tr>
                                                    <th style="text-align: center;">#</th>
                                                    <th><?= __('Full Name') ?></th>
                                                    <th><?= __('Gender') ?></th>
                                                    <th><?= __('Date Of Birth') ?></th>
                                                    <th style="text-align: center;">#</th>
                                                </tr>
                                                <?php foreach ($pollRespondents as $key => $pollRespondent) : ?>
                                                <tr>
                                                    <td style="text-align: center;"><?= $key + 1 ?></td>
                                                    <td><?= h($pollRespondent->full_name) ?></td>
                                                    <td>
                                                        <?php
                                                        $gender = 'Женский';
                                                        if ($pollRespondent->gender === '2') {
                                                            $gender = 'Мужской';
                                                        }
                                                        echo $gender;
                                                        ?>
                                                    </td>
                                                    <td><?= $pollRespondent->date_of_birth->format('d.m.Y') ?></td>
                                                    <td style="text-align: center;">
                                                        <?= $this->Html->link(__('View'), ['controller' => 'PollRespondents', 'action' => 'view', $pollRespondent->id]) ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </table>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
