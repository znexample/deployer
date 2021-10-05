<?php

namespace Deployer;

use ZnTool\Deployer\Helpers\LoaderHelper;

require_once __DIR__ . '/vendor/zntool/deployer/src/config/bootstrap.php';
//require_once __DIR__ . '/vendor/deployer/deployer/recipe/common.php';
//require_once __DIR__ . '/vendor/zntool/deployer/src/recipe/init_vars.php';
//require_once __DIR__ . '/vendor/zntool/deployer/src/recipe/init_ssh.php';
//require_once __DIR__ . '/vendor/zntool/deployer/src/recipe/zn.php';

$taskDir = __DIR__ . '/src/Deployer/Tasks';
LoaderHelper::loadTasks($taskDir);
