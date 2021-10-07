<?php

namespace Deployer;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/vendor/zntool/deployer/src/config/bootstrap.php';
//require_once __DIR__ . '/vendor/deployer/deployer/recipe/common.php';

require_once __DIR__ . '/vendor/zntool/deployer/src/recipe/app/deploy.php';
require_once __DIR__ . '/vendor/zntool/deployer/src/recipe/app/settings.php';
require_once __DIR__ . '/vendor/zntool/deployer/src/recipe/tools.php';
//requireLibs(__DIR__ . '/src/Deployer/recipe');

App::init();
App::initVarsFromArray([
    'repository' => 'git@gitlab.com:casino-zero/tournament.git',
    'branch' => 'clean',
    'public_directory' => 'public_html',
    'keep_releases' => 3,
    'allow_anonymous_stats' => 1,
    'git_tty' => 1,
    'application' => 'mysite',
    'default_stage' => 'staging',
]);
