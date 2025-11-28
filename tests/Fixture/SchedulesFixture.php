<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SchedulesFixture
 */
class SchedulesFixture extends TestFixture
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
                'time' => '12:56:45',
                'day' => 'Lorem ipsum dolor sit amet',
                'created' => '2025-10-29 12:56:45',
                'modified' => '2025-10-29 12:56:45',
                'extracurricular_id' => 1,
            ],
        ];
        parent::init();
    }
}
