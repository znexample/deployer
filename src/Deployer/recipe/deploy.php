<?php

namespace Deployer;

require_once __DIR__ . '/../../../vendor/zntool/deployer/src/recipe/deploy.php';

task('deploy:up', [
    //'ssh:connect',
    'deploy:info',
    'deploy:prepare',
//    'deploy:lock',
//    'deploy:release',
    'deploy:update_code',
    'deploy:vendors',
    'zn:init',
//    'deploy:shared',
//    'deploy:writable',
    'zn:run_migrations',
    'zn:import_fixtures',
//    'deploy:symlink',
//    'deploy:unlock',
//    'cleanup',
])->desc('Deploy your project');

//after('deploy', 'success');
