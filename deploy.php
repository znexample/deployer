<?php

namespace Deployer;

use Symfony\Component\Dotenv\Dotenv;

require_once __DIR__ . '/vendor/autoload.php';
//require_once __DIR__ . '/vendor/deployer/deployer/recipe/common.php';


$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');
//$dotenv->overload(__DIR__.'/.env.local');

//dd($_ENV);

host($_ENV['DEPLOYER_HOST_IP'])
    ->user($_ENV['DEPLOYER_HOST_USER'])
    ->port($_ENV['DEPLOYER_HOST_PORT'])
    //->identityFile('~/.ssh/deployerkey')
    //->set('deploy_path', '/var/www/html/laravel-app')
;

task('hello', function () {
    $output = run('ls -1');
    $lines = substr_count($output, "\n");
    writeln("Total files: $lines");
});

task('develop', function () {
    $output = run('apt install apache2');
    writeln($output);
});
