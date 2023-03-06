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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $corporativo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $corporativo->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Corporativos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="corporativos form content">
            <?= $this->Form->create($corporativo) ?>
            <fieldset>
                <legend><?= __('Edit Corporativo') ?></legend>
                <?php
                    echo $this->Form->control('nombre_corporativo');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
