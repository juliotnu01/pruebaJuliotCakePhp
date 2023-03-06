<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PanelsFixture
 */
class PanelsFixture extends TestFixture
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
                'id' => 'ac6a9c58-f304-4262-89b0-4df509cf3c08',
                'request_id' => '7a6bc8a5-c416-4a32-85f7-ee3a9f6192e8',
                'panel' => 'Lorem ipsum dolor sit amet',
                'title' => 'Lorem ipsum dolor sit amet',
                'element' => 'Lorem ipsum dolor sit amet',
                'summary' => 'Lorem ipsum dolor sit amet',
                'content' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
