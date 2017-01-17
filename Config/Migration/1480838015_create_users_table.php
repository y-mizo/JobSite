<?php

App::uses('User', 'Model');

class CreateUsersTable extends CakeMigration {

    /**
     * Migration description
     *
     * @var string
     */
    public $description = 'create_users_table';

    /**
     * Actions to be performed
     *
     * @var array $migration
     */
    public $migration = [
        'up' => [
            'create_table' => [
                'users' => [
                    'id' => [
                        'type' => 'integer',
                        'null' => false,
                        'default' => null,
                        'length' => 10,
                        'key' => 'primary'
                    ],
                    'username' => [
                        'type' => 'string',
                        'null' => false,
                        'default' => null,
                        'length' => 100
                    ],
                    'password' => [
                        'type' => 'string',
                        'null' => false,
                        'default' => null,
                        'length' => 255
                    ],
                    'email' => [
                        'type' => 'string',
                        'null' => false,
                        'default' => null,
                        'length' => 255
                    ],
                    'role' => [
                        'type' => 'string',
                        'null' => false,
                        'default' => null,
                        'length' => 20
                    ],
                    'created' => [
                        'type' => 'datetime'
                    ],
                    'modified' => [
                        'type' => 'datetime'
                    ],
                ],
            ],
        ],
        'down' => [
                'drop_table' => [
                    'users'
                ]
        ],
    ];

    /**
     * Before migration callback
     *
     * @param string $direction Direction of migration process (up or down)
     * @return bool Should process continue
     */
    public function before($direction) {
        return true;
    }

    /**
     * After migration callback
     *
     * @param string $direction Direction of migration process (up or down)
     * @return bool Should process continue
     */
    public function after($direction) {
        if ($direction === 'up') {
            $user = new User();
            
            $user->save([
                'username' => 'admin',
                'password' => 'admin123',
                'password_confirm' => 'admin123',
                'email' => 'admin@example.com',
                'role' => 'admin',
            ]); 
        }
        return true;
    }

}
