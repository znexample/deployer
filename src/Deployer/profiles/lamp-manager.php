<?php

return [
    'repository' => 'git@github.com:znproject/lamp-manager.git',
    'branch' => 'main',
    'deploy_path' => '/var/www/znproject/lamp-manager',
    'release_path' => '/var/www/znproject/lamp-manager',
    'release_public_path' => '{{release_path}}/public',
    'deploy_public_path' => '{{current_path}}/public',

    'deploy_var_path' => '{{deploy_path}}/var',
    'release_var_path' => '{{release_path}}/var',
    'current_path' => '{{deploy_path}}/current',

    'domain' => 'lamp.tool',

    'application' => 'LAMP manager',
    'permissions' => [
        [
            'path' => '{{deploy_var_path}}',
        ],
    ],
];
