<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class CreatePasosTable extends AbstractMigration
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
        $table = $this->table('pasos');
        $table->addColumn('pasos', 'integer', ['null' => true])
            ->addColumn('metros', 'decimal', ['null' => true, 'precision' => 4, 'scale' => 2, 'default' => 0.00])
            ->addColumn('user_corporativo_id', 'integer')
            ->addIndex(['user_corporativo_id'])
            ->addForeignKey('user_corporativo_id', 'user_corporativos', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'null' => false,
            ]);
        $table->create();
    }
}
