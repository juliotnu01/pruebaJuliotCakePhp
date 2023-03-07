<div class=" corporativos index content" style="margin-top: 10px">

    <h3>
        <?= __('Usuraios : Mas distancia en un mes') ?>
    </h3>
    <table>
        <div class="form content">
            <?= $this->Form->create(null, ['url' => ['controller' => 'Corporativos', 'action' => 'estadistica'], 'type' => 'POST']); ?>
            <?php
            echo $this->Form->control('tipo',  ['type' => 'hidden', 'empty' => true, 'value' => '1']);
            echo $this->Form->control('fecha_inicio',  ['type' => 'date', 'empty' => true, 'value' => date('yy-mm-dd')]);
            echo $this->Form->control('fecha_fin',  ['type' => 'date', 'empty' => true, 'value' => date('yy-mm-dd')]);
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
                <?php if (isset($pasos1)) {  ?>
                    <?php foreach ($pasos1 as $paso) : ?>
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
            <?php } ?>

            </tbody>
        </table>
    </div>
    <div class="paginator">

    </div>
</div>
<div class=" corporativos index content" style="margin-top: 10px">

    <h3>
        <?= __('Usuraios : Mas distancia en un dia') ?>
    </h3>
    <table>
        <div class="form content">
            <?= $this->Form->create(null, ['url' => ['controller' => 'Corporativos', 'action' => 'estadistica'], 'type' => 'POST']); ?>
            <?php
            echo $this->Form->control('tipo',  ['type' => 'hidden', 'empty' => true, 'value' => '2']);
            echo $this->Form->control('fecha_inicio',  ['type' => 'date', 'empty' => true, 'value' => date('yy-mm-dd')]);
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
                <?php if (isset($pasos2)) {  ?>
                    <?php foreach ($pasos2 as $paso) : ?>
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
            <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">

    </div>
</div>
<div class=" corporativos index content" style="margin-top: 10px">

    <h3>
        <?= __('Usuraios : Mas distancia, tres dias seguidos, en el lapso de una semana') ?>
    </h3>
    <table>
        <div class="form content">
            <?= $this->Form->create(null, ['url' => ['controller' => 'Corporativos', 'action' => 'estadistica'], 'type' => 'POST']); ?>
            <?php
            echo $this->Form->control('tipo',  ['type' => 'hidden', 'empty' => true, 'value' => '3']);
            echo $this->Form->control('fecha_inicio',  ['type' => 'date', 'empty' => true, 'value' => date('yy-mm-dd')]);
            echo $this->Form->control('fecha_fin',  ['type' => 'date', 'empty' => true, 'value' => date('yy-mm-dd')]);
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
                <?php if (isset($pasos3)) {  ?>
                    <?php foreach ($pasos3 as $paso) : ?>
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
            <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">

    </div>
</div>