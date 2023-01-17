<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProfileFixture
 */
class ProfileFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'profile';
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
                'user_id' => 1,
                'role' => 'Lorem ipsum dolor sit amet',
                'city' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
