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
