<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ImagesFixture
 */
class ImagesFixture extends TestFixture
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
                'image' => 'Lorem ipsum dolor sit amet',
                'created' => '2025-10-29 12:56:45',
                'modified' => '2025-10-29 12:56:45',
                'activity_id' => 1,
            ],
        ];
        parent::init();
    }
}
