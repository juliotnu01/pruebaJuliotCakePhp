<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserCorporativosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserCorporativosTable Test Case
 */
class UserCorporativosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UserCorporativosTable
     */
    protected $UserCorporativos;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.UserCorporativos',
        'app.Corporativos',
        'app.Pasos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('UserCorporativos') ? [] : ['className' => UserCorporativosTable::class];
        $this->UserCorporativos = $this->getTableLocator()->get('UserCorporativos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->UserCorporativos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UserCorporativosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\UserCorporativosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
