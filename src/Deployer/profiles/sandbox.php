<?php

return [
    'repository' => 'git@gitlab.com:php-lab/sandbox.git',
    'branch' => 'develop',
    'deploy_path' => '/var/www/php-lab/sandbox',
    'release_path' => '/var/www/php-lab/sandbox',
    //'release_public_path' => '{{release_path}}/public',
    //'deploy_public_path' => '{{current_path}}/public',

    'deploy_var_path' => '{{deploy_path}}/var',
    'release_var_path' => '{{release_path}}/var',
    //'current_path' => '{{deploy_path}}/current',

    'domains' => [
        [
            'domain' => 'sandbox.lab',
            'directory' => '{{current_path}}/public',
        ],
    ],

    'application' => 'Sandbox lab',
    'permissions' => [
        [
            'path' => '{{deploy_var_path}}',
        ],
    ],
];