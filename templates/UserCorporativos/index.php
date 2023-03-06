<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\UserCorporativo> $userCorporativos
 */

?>
<div class="userCorporativos index content">
    <?= $this->Html->link(__('New User Corporativo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('User Corporativos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('corporativo_id') ?></th>
                    <!-- <th><?= $this->Paginator->sort('created') ?></th> -->
                    <!-- <th><?= $this->Paginator->sort('modified') ?></th> -->
                    <th><?= $this->Paginator->sort('fecha_inicio') ?></th>
                    <th><?= $this->Paginator->sort('fecha_fin') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userCorporativos as $userCorporativo) : ?>
                    <tr>
                        <td><?= $this->Number->format($userCorporativo->id) ?></td>
                        <td><?= h($userCorporativo->nombre) ?></td>
                        <td><?= $userCorporativo->has('corporativo') ? $this->Html->link($userCorporativo->corporativo->id, ['controller' => 'Corporativos', 'action' => 'view', $userCorporativo->corporativo->id]) : '' ?></td>
                        <!-- <td><?= h($userCorporativo->created) ?></td> -->
                        <!-- <td><?= h($userCorporativo->modified) ?></td> -->
                        <td><?= h($userCorporativo->fecha_inicio) ?></td>
                        <td><?= h($userCorporativo->fecha_fin) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $userCorporativo->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userCorporativo->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userCorporativo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userCorporativo->id)]) ?>
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