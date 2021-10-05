<?php

namespace Deployer;

require_once __DIR__ . '/vendor/zntool/deployer/src/config/bootstrap.php';

App::init();
App::loadTasks(__DIR__ . '/src/Deployer/recipe');
