<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Paso> $pasos
 */
?>
<div class="pasos index content">
    <?= $this->Html->link(__('New Paso'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Pasos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('pasos') ?></th>
                    <th><?= $this->Paginator->sort('metros') ?></th>
                    <th><?= $this->Paginator->sort('user_corporativo_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pasos as $paso): ?>
                <tr>
                    <td><?= $this->Number->format($paso->id) ?></td>
                    <td><?= $paso->pasos === null ? '' : $this->Number->format($paso->pasos) ?></td>
                    <td><?= $paso->metros === null ? '' : $this->Number->format($paso->metros) ?></td>
                    <td><?= $paso->has('user_corporativo') ? $this->Html->link($paso->user_corporativo->id, ['controller' => 'UserCorporativos', 'action' => 'view', $paso->user_corporativo->id]) : '' ?></td>
                    <td><?= h($paso->created) ?></td>
                    <td><?= h($paso->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $paso->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $paso->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $paso->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paso->id)]) ?>
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
