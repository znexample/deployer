<?php

namespace Deployer;

require_once __DIR__ . '/src/Deployer/bootstrap.php';
require_once __DIR__ . '/src/Deployer/config.php';
require_once __DIR__ . '/src/Deployer/Tasks/develop.php';
//require_once __DIR__ . '/vendor/deployer/deployer/recipe/common.php';

task('hello', function () {
    $output = run('ls -l');
    $lines = substr_count($output, "\n");
    writeln("Total files: $lines");
});
