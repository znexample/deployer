<?php

namespace Deployer;

require_once __DIR__ . '/src/Deployer/config/bootstrap.php';
require_once __DIR__ . '/src/Deployer/config/config.php';
require_once __DIR__ . '/src/Deployer/Tasks/develop.php';
require_once __DIR__ . '/src/Deployer/Tasks/deploy.php';
require_once __DIR__ . '/vendor/deployer/deployer/recipe/common.php';
