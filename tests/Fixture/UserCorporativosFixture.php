<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UserCorporativosFixture
 */
class UserCorporativosFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'nombre' => 'Lorem ipsum dolor sit amet',
                'corporativo_id' => 1,
                'created' => '2023-03-04 19:11:05',
                'modified' => '2023-03-04 19:11:05',
                'fecha_inicio' => '2023-03-04',
                'fecha_fin' => '2023-03-04',
            ],
        ];
        parent::init();
    }
}
