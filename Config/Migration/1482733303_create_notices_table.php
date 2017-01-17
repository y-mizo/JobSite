<?php

class CreateNoticesTable extends CakeMigration {

    /**
     * Migration description
     *
     * @var string
     */
    public $description = 'create_notices_table';

    /**
     * Actions to be performed
     *
     * @var array $migration
     */
    public $migration = [
        'up' => [
            'create_table' => [
                'notices' => [
                    'id' => [
                        'type' => 'integer',
                        'null' => false,
                        'default' => null,
                        'length' => 10,
                        'key' => 'primary',
                    ],
                    'subject' => [
                        'type' => 'string',
                        'null' => false,
                        'default' => null,
                        'length' => 255,
                    ],
                    'body' => [
                        'type' => 'text',
                        'null' => false,
                        'default' => null,
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
                'notices'
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
        return true;
    }

}
