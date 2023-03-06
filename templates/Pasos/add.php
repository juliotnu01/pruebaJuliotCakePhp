<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Paso $paso
 * @var \Cake\Collection\CollectionInterface|string[] $userCorporativos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Pasos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pasos form content">
            <?= $this->Form->create($paso) ?>
            <fieldset>
                <legend><?= __('Add Paso') ?></legend>
                <?php
                    echo $this->Form->control('pasos');
                    echo $this->Form->control('metros');
                    echo $this->Form->control('user_corporativo_id', ['options' => $userCorporativos]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
