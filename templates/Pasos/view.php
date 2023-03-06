<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Paso $paso
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Paso'), ['action' => 'edit', $paso->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Paso'), ['action' => 'delete', $paso->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paso->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pasos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Paso'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pasos view content">
            <h3><?= h($paso->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User Corporativo') ?></th>
                    <td><?= $paso->has('user_corporativo') ? $this->Html->link($paso->user_corporativo->id, ['controller' => 'UserCorporativos', 'action' => 'view', $paso->user_corporativo->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($paso->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pasos') ?></th>
                    <td><?= $paso->pasos === null ? '' : $this->Number->format($paso->pasos) ?></td>
                </tr>
                <tr>
                    <th><?= __('Metros') ?></th>
                    <td><?= $paso->metros === null ? '' : $this->Number->format($paso->metros) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($paso->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($paso->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
