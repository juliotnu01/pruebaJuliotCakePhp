<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateUserCorporativoTable extends AbstractMigration
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
        $table->addColumn('nombre', 'string', ['null' => true, 'default' => null])
            ->addColumn('corporativo_id', 'integer')
            ->addIndex(['corporativo_id'])
            ->addForeignKey('corporativo_id', 'corporativos', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
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
