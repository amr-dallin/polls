<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PollRespondent $pollRespondent
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Poll Respondent'), ['action' => 'edit', $pollRespondent->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Poll Respondent'), ['action' => 'delete', $pollRespondent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pollRespondent->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Poll Respondents'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Poll Respondent'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pollRespondents view content">
            <table>
                <tr>
                    <th><?= __('Poll') ?></th>
                    <td><?= $pollRespondent->has('poll') ? $this->Html->link($pollRespondent->poll->id, ['controller' => 'Polls', 'action' => 'view', $pollRespondent->poll->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Full Name') ?></th>
                    <td><?= h($pollRespondent->full_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Year Of Admission') ?></th>
                    <td><?= h($pollRespondent->year_of_admission) ?></td>
                </tr>
                <tr>
                    <th><?= __('Faculty') ?></th>
                    <td>
                        <?php
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
                        echo $faculty;
                        ?>
                    </td>
                </tr>
                <tr>
                    <th><?= __('Group') ?></th>
                    <td><?= $pollRespondent->faculty . $pollRespondent->language . substr($pollRespondent->year_of_admission, -2) . $pollRespondent->group_symbol; ?></td>
                </tr>
                <tr>
                    <th><?= __('Date Of Birth') ?></th>
                    <td><?= $pollRespondent->date_of_birth->format('d.m.Y') ?></td>
                </tr>
                <tr>
                    <th><?= __('Gender') ?></th>
                    <td>
                        <?php
                        $gender = 'Женский';
                        if ($pollRespondent->gender === '2') {
                            $gender = 'Мужской';
                        }
                        echo $gender;
                        ?>
                    </td>
                </tr>
            </table>
            
            <?php if (!empty($pollRespondent->poll_questions)) : ?>
            <hr/>

            <h5>1. Шкала неискренности</h5>
            <?php
            $total = 0;
            foreach($pollRespondent->poll_questions as $pollQuestion) {
                if (in_array($pollQuestion->question_number, [3, 5, 6, 8])) {
                    if ($pollQuestion->answer) {
                        $total++;
                    }
                }

                if (in_array($pollQuestion->question_number, [1, 2, 4, 7, 9, 10])) {
                    if (!$pollQuestion->answer) {
                        $total++;
                    }
                }
            }
            ?>

            <div style="color: green;">
                <?php
                if ($total > 6) {
                    echo 'Респондент не искренен';
                } else {
                    echo 'Респондент искренен';
                }
                ?>
            </div>
            <hr/>

            <h5>2. Изучение темперамента</h5>
            <?php
            $total1 = 0;
            $total2 = 0;
            $total3 = 0;
            $total4 = 0;
            foreach($pollRespondent->poll_questions as $pollQuestion) {
                if (in_array($pollQuestion->question_number, [11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24])) {
                    if ($pollQuestion->answer) {
                        $total1++;
                    }
                }

                if (in_array($pollQuestion->question_number, [25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38])) {
                    if ($pollQuestion->answer) {
                        $total2++;
                    }
                }

                if (in_array($pollQuestion->question_number, [39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52])) {
                    if ($pollQuestion->answer) {
                        $total3++;
                    }
                }

                if (in_array($pollQuestion->question_number, [53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66])) {
                    if ($pollQuestion->answer) {
                        $total4++;
                    }
                }
            }
            ?>
            <div>Доминирующий тип темперамента:</div>
            <div style="color: green; margin-bottom: 10px;">
                <?php
                if ($total1 > 10) {
                    echo 'Холерический темперамент';
                } elseif ($total2 > 10) {
                    echo 'Сангвинический темперамент';
                } elseif ($total3 > 10) {
                    echo 'Флегматический темперамент';
                } elseif ($total4 > 10) {
                    echo 'Меланхолический темперамент';
                } else {
                    echo 'Нет доминирующего темперамента';
                }
                ?>
            </div>
            <div>Выражен в значительной мере:</div>
            <div style="color: green; margin-bottom: 10px;">
                <?php
                if ($total1 >= 5 && $total1 <= 9) {
                    echo 'Холерический темперамент';
                } elseif ($total2 >= 5 && $total2 <= 9) {
                    echo 'Сангвинический темперамент';
                } elseif ($total3 >= 5 && $total3 <= 9) {
                    echo 'Флегматический темперамент';
                } elseif ($total4 >= 5 && $total4 <= 9) {
                    echo 'Меланхолический темперамент';
                } else {
                    echo 'Нет присутствуют';
                }
                ?>
            </div>

            <hr/>
            <h5>3. Изучение уровня стресса</h5>
            <?php
            $total = 0;
            foreach($pollRespondent->poll_questions as $pollQuestion) {
                if (in_array($pollQuestion->question_number, [67, 68, 69, 70, 71, 72, 73, 74, 75])) {
                    if ($pollQuestion->answer) {
                        $total++;
                    }
                }
            }
            ?>

            <div style="color: green;">
                <?php
                if ($total <= 4) {
                    echo 'Высокий уровень регуляции в стрессовых ситуациях';
                } elseif ($total >= 5 && $total <= 7) {
                    echo 'Умеренный уровень регуляции в стрессовых ситуациях';
                } elseif ($total >= 8 && $total <= 9) {
                    echo 'Слабый уровень регуляции в стрессовых ситуациях';
                }
                ?>
            </div>

            <hr/>
            <h5>4. Изучение характера</h5>
            <?php
            $total = 0;
            foreach($pollRespondent->poll_questions as $pollQuestion) {
                if ($pollQuestion->question_number === 76) {
                    if ($pollQuestion->answer) {
                        $total = $total + 4;
                    } else {
                        $total = $total + 1;
                    }
                }

                if ($pollQuestion->question_number === 77) {
                    if ($pollQuestion->answer) {
                        $total = $total + 3;
                    } else {
                        $total = $total + 2;
                    }
                }

                if ($pollQuestion->question_number === 78) {
                    if ($pollQuestion->answer) {
                        $total = $total + 1;
                    } else {
                        $total = $total + 3;
                    }
                }

                if ($pollQuestion->question_number === 79) {
                    if ($pollQuestion->answer) {
                        $total = $total + 1;
                    } else {
                        $total = $total + 3;
                    }
                }

                if ($pollQuestion->question_number === 80) {
                    if ($pollQuestion->answer) {
                        $total = $total + 4;
                    } else {
                        $total = $total + 2;
                    }
                }

                if ($pollQuestion->question_number === 81) {
                    if ($pollQuestion->answer) {
                        $total = $total + 1;
                    } else {
                        $total = $total + 2;
                    }
                }

                if ($pollQuestion->question_number === 82) {
                    if ($pollQuestion->answer) {
                        $total = $total + 3;
                    } else {
                        $total = $total + 1;
                    }
                }

                if ($pollQuestion->question_number === 83) {
                    if ($pollQuestion->answer) {
                        $total = $total + 3;
                    } else {
                        $total = $total + 1;
                    }
                }

                if ($pollQuestion->question_number === 84) {
                    if ($pollQuestion->answer) {
                        $total = $total + 1;
                    } else {
                        $total = $total + 4;
                    }
                }

                if ($pollQuestion->question_number === 85) {
                    if ($pollQuestion->answer) {
                        $total = $total + 1;
                    } else {
                        $total = $total + 4;
                    }
                }

                if ($pollQuestion->question_number === 86) {
                    if ($pollQuestion->answer) {
                        $total = $total + 4;
                    } else {
                        $total = $total + 1;
                    }
                }
            }
            ?>

            <div style="color: green;">
                <?php
                if ($total <= 20) {
                    echo 'Респондент тонкая натура, чувствительная, предпочитающая покой';
                } elseif ($total >= 21 && $total <= 25) {
                    echo 'Респондент флегматик. Фаталист. Нуждается в доброжелательности знакомых, очень сильно зависит от чужого мнения';
                } elseif ($total >= 26) {
                    echo 'Респондент обладает ровным характером, умеющим контролировать свои чувства, желания, потребности';
                }
                ?>
            </div>

            <hr/>
            <h5>5. Изучение социально-психологических установок личности в мотивационно-потребностной сфере</h5>
            <?php
            $total1 = 0;
            $total2 = 0;
            foreach($pollRespondent->poll_questions as $pollQuestion) {
                if (in_array($pollQuestion->question_number, [87, 89, 91, 93, 95, 97, 99, 101, 103, 105])) {
                    if ($pollQuestion->answer) {
                        $total1++;
                    }
                }

                if (in_array($pollQuestion->question_number, [88, 90, 92, 94, 96, 98, 100, 102, 104, 106])) {
                    if ($pollQuestion->answer) {
                        $total2++;
                    }
                }
            }
            ?>

            <div>Ориентация на результат:</div>
            <div style="color: green;">
                <?php
                if ($total1 >= 1 && $total1 <= 3) {
                    echo 'Низкая степень выраженности на результат. Респондент имеет слабовыраженную направленность на достижение результата';
                } elseif ($total1 >= 4 && $total1 <= 6) {
                    echo 'Средняя степень выраженности на результат. Респондент в процессе работы не всегда ориентирован на результат работы. При больших сложностях в процессе работы, может совершать ошибки';
                } elseif ($total1 >= 7 && $total1 <= 10) {
                    echo 'Сильная степень выраженности на результат. Респондент может достигать результата в своей деятельности вопреки суете, помехам, неудачам';
                }
                ?>
            </div>

            <br/>

            <div>Ориентация на альтруизм:</div>
            <div style="color: green;">
                <?php
                if ($total2 >= 1 && $total2 <= 3) {
                    echo 'Низкая степень выраженности ориентации на альтруизм. Респондент имеет слабовыраженную направленность на альтруизм (ведение дел на общественных началах)';
                } elseif ($total2 >= 4 && $total2 <= 6) {
                    echo 'Средняя степень выраженности ориентации на альтруизм. Респондент может некоторое время работать на общественных началах, но при наличии собственной выгоды';
                } elseif ($total2 >= 7 && $total2 <= 10) {
                    echo 'Сильная степень выраженности на результат. Респондент часто в ущерб себе, ведет дела общественного начала, что само по себе заслуживает всяческого уважения';
                }
                ?>
            </div>

            <hr/>
            <h5>6. Изучаем уровень тревожности</h5>
            <?php
            $total = 0;
            foreach($pollRespondent->poll_questions as $pollQuestion) {
                if (in_array($pollQuestion->question_number, [107, 108, 109, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 124, 125, 126])) {
                    if ($pollQuestion->answer) {
                        $total++;
                    }
                }
            }
            ?>

            <div style="color: green;">
                <?php
                if ($total <= 6) {
                    echo 'Низкий уровень тревожности';
                } elseif ($total >= 7 && $total <= 13) {
                    echo 'Средний уровень тревожности';
                } elseif ($total >= 14 && $total <= 20) {
                    echo 'Высокий уровень тревожности';
                }
                ?>
            </div>

            <hr/>
            <h5>7. Изучение способности излагать свои мысли</h5>
            <?php
            $total = 0;
            foreach($pollRespondent->poll_questions as $pollQuestion) {
                if (in_array($pollQuestion->question_number, [127, 128, 129, 130, 132, 133, 134, 135, 136, 140, 141, 142])) {
                    if ($pollQuestion->answer) {
                        $total++;
                    }
                }

                if (in_array($pollQuestion->question_number, [131, 137, 138, 139])) {
                    if (!$pollQuestion->answer) {
                        $total++;
                    }
                }
            }
            ?>

            <div style="color: green;">
                <?php
                if ($total <= 9) {
                    echo 'Респонденту необходимо развить в себе навыки письменной и устной коммуникации, чтобы правильно излагать мысли и быть понятым собеседником, адресатом';
                } elseif ($total >= 10 && $total < 12) {
                    echo 'Умение четко излагать свои мысли и формировать грамотный ответ находится на среднем уровне';
                } elseif ($total >= 12 && $total <= 16) {
                    echo 'Респондент умеет грамотно и четко излагать свои мысли, старается, чтобы его собеседник правильно понял';
                }
                ?>
            </div>

            <hr/>

            <div class="related">
                <h4><?= __('Questions') ?></h4>

                <div class="table-responsive">
                    <table>
                        <tr>
                            <th style="text-align: center;"><?= __('Number') ?></th>
                            <th style="text-align: center;"><?= __('Answer') ?></th>
                        </tr>
                        <?php foreach ($pollRespondent->poll_questions as $pollQuestions) : ?>
                        <tr>
                            <td style="text-align: center;"><?= h($pollQuestions->question_number) ?></td>
                            <td style="text-align: center;"><?= ($pollQuestions->answer) ? '<span style="color: green;">' . __('Yes') . '</span>' : '<span style="color: red;">' . __('No') . '</span>' ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
