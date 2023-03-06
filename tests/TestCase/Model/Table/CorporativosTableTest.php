<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CorporativosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CorporativosTable Test Case
 */
class CorporativosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CorporativosTable
     */
    protected $Corporativos;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Corporativos',
        'app.UserCorporativos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Corporativos') ? [] : ['className' => CorporativosTable::class];
        $this->Corporativos = $this->getTableLocator()->get('Corporativos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Corporativos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CorporativosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
