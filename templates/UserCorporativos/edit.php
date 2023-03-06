<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserCorporativo $userCorporativo
 * @var string[]|\Cake\Collection\CollectionInterface $corporativos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userCorporativo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userCorporativo->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List User Corporativos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userCorporativos form content">
            <?= $this->Form->create($userCorporativo) ?>
            <fieldset>
                <legend><?= __('Edit User Corporativo') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('corporativo_id', ['options' => $corporativos]);
                    echo $this->Form->control('fecha_inicio', ['empty' => true]);
                    echo $this->Form->control('fecha_fin', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
