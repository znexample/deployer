<?php

namespace Deployer;

require_once __DIR__ . '/src/bootstrap.php';
require_once __DIR__ . '/src/config.php';
//require_once __DIR__ . '/vendor/deployer/deployer/recipe/common.php';

task('hello', function () {
    $output = run('ls -l');
    $lines = substr_count($output, "\n");
    writeln("Total files: $lines");
});

task('develop:install', function () {
    cd('/');
    $output = run('ls -l');
    writeln($output);
});
