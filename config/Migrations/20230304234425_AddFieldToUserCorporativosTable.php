<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class AddFieldToUserCorporativosTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('user_corporativos');
        $table->addColumn('fecha_inicio', 'date', ['null' => true])
            ->addColumn('fecha_fin', 'date', ['null' => true]);
        $table->update();
    }
}
