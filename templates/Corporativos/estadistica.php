<div class="corporativos index content">

    <h3>
        <?= __('Usuraios : Mas distancia en un mes') ?>
    </h3>
    <table>
        <div class="form content">
            <?= $this->Form->create(null, ['url' => ['controller' => 'Corporativos', 'action' => 'estadistica'], 'type' => 'GET']); ?>
            <?php
            echo $this->Form->control('fecha_inicio',  ['type' => 'date', 'empty' => true]);
            echo $this->Form->control('fecha_fin',  ['type' => 'date', 'empty' => true]);
            ?>
            <?= $this->Form->button(__('Buscar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </table>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>nombre</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pasos as $paso) : ?>
                    <tr>
                        <td>
                            <?php echo $paso['nombre']; ?>
                        </td>
                        <td>
                            <?php foreach ($paso['pasos'] as $dia) : ?>
                    <tr>
                        <td>
                            Pasos:<?php echo $dia['pasos']; ?><br />
                            Metros:<?php echo $dia['metros']; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">

    </div>
</div>