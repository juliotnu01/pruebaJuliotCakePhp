<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PasosFixture
 */
class PasosFixture extends TestFixture
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
                'pasos' => 1,
                'metros' => 1.5,
                'user_corporativo_id' => 1,
                'created' => '2023-03-04 19:10:30',
                'modified' => '2023-03-04 19:10:30',
            ],
        ];
        parent::init();
    }
}
