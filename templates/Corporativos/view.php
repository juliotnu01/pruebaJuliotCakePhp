<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Corporativo $corporativo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Corporativo'), ['action' => 'edit', $corporativo->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Corporativo'), ['action' => 'delete', $corporativo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $corporativo->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Corporativos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Corporativo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="corporativos view content">
            <h3><?= h($corporativo->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre Corporativo') ?></th>
                    <td><?= h($corporativo->nombre_corporativo) ?></td>
                </tr>
                <!-- <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($corporativo->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($corporativo->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($corporativo->modified) ?></td>
                </tr> -->
            </table>
            <div class="related">
                <h4><?= __('Usuarios Relacionados') ?></h4>
                <?php if (!empty($corporativo->user_corporativos)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('Nombre') ?></th>
                                <!-- <th><?= __('Corporativo Id') ?></th> -->
                                <!-- <th><?= __('Created') ?></th> -->
                                <!-- <th><?= __('Modified') ?></th> -->
                                <th><?= __('Fecha Inicio') ?></th>
                                <th><?= __('Fecha Fin') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($corporativo->user_corporativos as $userCorporativos) : ?>
                                <tr>
                                    <td><?= h($userCorporativos->id) ?></td>
                                    <td><?= h($userCorporativos->nombre) ?></td>
                                    <!-- <td><?= h($userCorporativos->corporativo_id) ?></td> -->
                                    <!-- <td><?= h($userCorporativos->created) ?></td> -->
                                    <!-- <td><?= h($userCorporativos->modified) ?></td> -->
                                    <td><?= h($userCorporativos->fecha_inicio) ?></td>
                                    <td><?= h($userCorporativos->fecha_fin) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'UserCorporativos', 'action' => 'view', $userCorporativos->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'UserCorporativos', 'action' => 'edit', $userCorporativos->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserCorporativos', 'action' => 'delete', $userCorporativos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userCorporativos->id)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>