<?php

class CreateJobsTable extends CakeMigration {

    /**
     * Migration description
     *
     * @var string
     */
    public $description = 'create_Jobs_table';

    /**
     * Actions to be performed
     *
     * @var array $migration
     */
    public $migration = [
        'up' => [
            'create_table' => [
                'jobs' => [
                    'id' => [
                        'type' => 'integer',
                        'null' => false,
                        'default' => null,
                        'length' => 10,
                        'key' => 'primary',
                    ],
                    'category_id' => [
                        'type' => 'integer',
                        'null' => false,
                        'default' => null,
                        'length' => 10,
                    ],
                    'title' => [
                        'type' => 'string',
                        'null' => false,
                        'default' => null,
                        'length' => 255,
                    ],
                    'description' => [
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
                'jobs'
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
