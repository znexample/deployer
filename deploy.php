<?php

namespace Deployer;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/vendor/zntool/deployer/src/config/bootstrap.php';
require_once __DIR__ . '/vendor/deployer/deployer/recipe/common.php';

App::init();

require_once __DIR__ . '/src/Deployer/recipe/deploy.php';

//require_once __DIR__ . '/vendor/zntool/deployer/src/config/bootstrap.php';

//App::init();
//App::loadTasks(__DIR__ . '/src/Deployer/recipe');
