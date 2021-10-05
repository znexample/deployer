<?php

namespace Deployer;

//{{bin/git}}

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

task('deploy:prepare', function () {
    makeDirectory('{{deploy_path}}');
    $isExists = isFileExists("{{deploy_path}}/.env");
    //cd('{{deploy_path}}');
    if(! $isExists) {
        writeln('git clone');
        $output = run('{{bin/git}} clone {{repository}} {{deploy_path}}');
    }
    makeDirectory('{{deploy_path}}/.dep');
});

task('deploy:update_code', function () {
    cd('{{deploy_path}}');
    $output = run('{{bin/git}} fetch origin {{branch}}');
    $output = run('{{bin/git}} checkout {{branch}}');
    $output = run('{{bin/git}} pull');
    writeln($output);
});

task('deploy:down', function () {
    $output = run('rm -rf {{deploy_path}}');
    writeln($output);
});
