<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CorporativosFixture
 */
class CorporativosFixture extends TestFixture
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
                'nombre_corporativo' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-03-04 18:47:34',
                'modified' => '2023-03-04 18:47:34',
            ],
        ];
        parent::init();
    }
}
