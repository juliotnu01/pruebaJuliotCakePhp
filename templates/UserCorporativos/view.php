<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserCorporativo $userCorporativo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User Corporativo'), ['action' => 'edit', $userCorporativo->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User Corporativo'), ['action' => 'delete', $userCorporativo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userCorporativo->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List User Corporativos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User Corporativo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userCorporativos view content">
            <h3><?= h($userCorporativo->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($userCorporativo->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Corporativo') ?></th>
                    <td><?= $userCorporativo->has('corporativo') ? $this->Html->link($userCorporativo->corporativo->id, ['controller' => 'Corporativos', 'action' => 'view', $userCorporativo->corporativo->id]) : '' ?></td>
                </tr>
                <!-- <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($userCorporativo->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($userCorporativo->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($userCorporativo->modified) ?></td>
                </tr> -->
                <tr>
                    <th><?= __('Fecha Inicio') ?></th>
                    <td><?= h($userCorporativo->fecha_inicio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Fin') ?></th>
                    <td><?= h($userCorporativo->fecha_fin) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Pasos relacionados') ?></h4>
                <?php if (!empty($userCorporativo->pasos)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <!-- <th><?= __('Id') ?></th> -->
                                <th><?= __('Pasos') ?></th>
                                <th><?= __('Metros') ?></th>
                                <!-- <th><?= __('User Corporativo Id') ?></th> -->
                                <th><?= __('Created') ?></th>
                                <th><?= __('Modified') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($userCorporativo->pasos as $pasos) : ?>
                                <tr>
                                    <!-- <td><?= h($pasos->id) ?></td> -->
                                    <td><?= h($pasos->pasos) ?></td>
                                    <td><?= h($pasos->metros) ?></td>
                                    <!-- <td><?= h($pasos->user_corporativo_id) ?></td> -->
                                    <td><?= h($pasos->created) ?></td>
                                    <td><?= h($pasos->modified) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'Pasos', 'action' => 'view', $pasos->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'Pasos', 'action' => 'edit', $pasos->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Pasos', 'action' => 'delete', $pasos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pasos->id)]) ?>
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

<script>
    var usuario_id = <?= $userCorporativo->id ?>;
    var ws = new WebSocket("ws://localhost:3000");
    ws.onopen = function(event) {
        console.log("Conectado al servidor WebSocket");
    };

    ws.onmessage = function(event) {
        var incomingMessage = JSON.parse(event.data.trim())
        if (incomingMessage.id == usuario_id) {

            alert('se han agregado registro de paso')
        }


    };

    ws.onclose = function(event) {
        console.log("Desconectado del servidor WebSocket");
    };
</script>