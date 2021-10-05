<?php

namespace Deployer;

use App\Deployer\Helpers\LoaderHelper;

require_once __DIR__ . '/src/Deployer/config/bootstrap.php';
require_once __DIR__ . '/vendor/deployer/deployer/recipe/common.php';
//require_once __DIR__ . '/vendor/deployer/deployer/recipe/';
require_once __DIR__ . '/src/Deployer/recipe/init_ssh.php';
require_once __DIR__ . '/src/Deployer/recipe/functions.php';
require_once __DIR__ . '/src/Deployer/recipe/zn.php';

$taskDir = __DIR__ . '/src/Deployer/Tasks';
LoaderHelper::loadTasks($taskDir);
