<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StudentsFixture
 */
class StudentsFixture extends TestFixture
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
                'nis' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'created' => '2025-10-29 12:56:45',
                'modified' => '2025-10-29 12:56:45',
                'user_id' => 1,
            ],
        ];
        parent::init();
    }
}
