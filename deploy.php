<?php

namespace Deployer;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/vendor/zntool/deployer/src/config/bootstrap.php';
//require_once __DIR__ . '/vendor/deployer/deployer/recipe/common.php';

require_once __DIR__ . '/vendor/zntool/deployer/src/recipe/app/deploy.php';
require_once __DIR__ . '/vendor/zntool/deployer/src/recipe/app/settings.php';
require_once __DIR__ . '/vendor/zntool/deployer/src/recipe/app/upgrade_vendor.php';
require_once __DIR__ . '/vendor/zntool/deployer/src/recipe/tools.php';
//requireLibs(__DIR__ . '/src/Deployer/recipe');

App::initVarsFromArray([

    'profiles' => [
        'default' => [],
        'lamp-manager' => [
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
        ],
        'sandbox' => [
            'repository' => 'git@gitlab.com:php-lab/sandbox.git',
            'branch' => 'develop',
            'deploy_path' => '/var/www/php-lab/sandbox',
            'release_path' => '/var/www/php-lab/sandbox',
            'release_public_path' => '{{release_path}}/public',
            'deploy_public_path' => '{{current_path}}/public',

            'deploy_var_path' => '{{deploy_path}}/var',
            'release_var_path' => '{{release_path}}/var',
            'current_path' => '{{deploy_path}}/current',

            'domain' => 'sandbox.lab',

            'application' => 'Sandbox lab',
            'permissions' => [
                [
                    'path' => '{{deploy_var_path}}',
                ],
            ],
        ],
    ],

    'application' => 'deployer',
    'ssh_key_list' => [
        [
            'name' => 'my-github',
            'host' => 'github.com',
        ],
        [
            'name' => 'my-gitlab',
            'host' => 'gitlab.com',
        ],
    ],
]);

App::init();
