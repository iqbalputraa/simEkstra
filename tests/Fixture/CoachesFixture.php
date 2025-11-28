<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CoachesFixture
 */
class CoachesFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'created' => '2025-10-29 12:56:44',
                'modified' => '2025-10-29 12:56:44',
                'user_id' => 1,
            ],
        ];
        parent::init();
    }
}
