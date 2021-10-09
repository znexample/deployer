<?php

namespace Deployer;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/vendor/zntool/deployer/src/config/bootstrap.php';
//require_once __DIR__ . '/vendor/deployer/deployer/recipe/common.php';

require_once __DIR__ . '/vendor/zntool/deployer/src/recipe/app/deploy.php';
require_once __DIR__ . '/vendor/zntool/deployer/src/recipe/app/settings.php';
require_once __DIR__ . '/vendor/zntool/deployer/src/recipe/tools.php';
//requireLibs(__DIR__ . '/src/Deployer/recipe');

App::initVarsFromArray([
    'repository' => 'git@gitlab.com:casino-zero/tournament.git',
    'branch' => 'clean',
//    'public_directory' => 'public_html',
    'deploy_path' => '/var/www/casino-zero/tournament',
    'release_path' => '/var/www/casino-zero/tournament',
    'release_public_path' => '{{release_path}}/public_html',
    'deploy_public_path' => '{{deploy_path}}/public_html',
    'domain' => 'tournament.casino',
//    'ssh_directory' => '/home/zneveloper/.ssh',

    'show_detail' => 0,
    'sudo_cmd' => 'sudo -S {command} < ~/sudo-pass',
    'keep_releases' => 3,
    'allow_anonymous_stats' => 1,
    'git_tty' => 1,
    'application' => 'mysite',
    'default_stage' => 'staging',
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