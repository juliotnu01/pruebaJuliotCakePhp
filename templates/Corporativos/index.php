<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Corporativo> $corporativos
 */
?>
<div class="corporativos index content">
    <?= $this->Html->link(__('New Corporativo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Corporativos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nombre_corporativo') ?></th>
                    <!-- <th><?= $this->Paginator->sort('created') ?></th> -->
                    <!-- <th><?= $this->Paginator->sort('modified') ?></th> -->
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($corporativos as $corporativo) : ?>
                    <tr>
                        <td><?= $this->Number->format($corporativo->id) ?></td>
                        <td><?= h($corporativo->nombre_corporativo) ?></td>
                        <!-- <td><?= h($corporativo->created) ?></td> -->
                        <!-- <td><?= h($corporativo->modified) ?></td> -->
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $corporativo->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $corporativo->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $corporativo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $corporativo->id)]) ?>
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