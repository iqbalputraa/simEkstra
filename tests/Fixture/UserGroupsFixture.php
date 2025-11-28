<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UserGroupsFixture
 */
class UserGroupsFixture extends TestFixture
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
                'group_name' => 1,
                'created' => '2025-10-29 12:56:45',
                'modified' => '2025-10-29 12:56:45',
                'student_id' => 1,
            ],
        ];
        parent::init();
    }
}
