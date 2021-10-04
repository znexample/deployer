<?php

namespace Deployer;

//{{bin/git}}

task('deploy:up', [
    'deploy:info',
    'deploy:init',

//    'deploy:prepare',
//    'deploy:lock',
//    'deploy:release',
//    'deploy:update_code',
    'deploy:vendors',
//    'deploy:init',
//    'deploy:shared',
//    'deploy:writable',
//    'deploy:run_migrations',
//    'deploy:symlink',
//    'deploy:unlock',
//    'cleanup',
])->desc('Deploy your project');

task('deploy:init', function () {
//    initProject('git@gitlab.com:casino-zero/tournament.git', 'casino-zero/tournament');
    //cd('/var/www/casino-zero');
    $isExists = test("[ -f {{deploy_path}}/.env ]");
    //$output = run('ls -l');
    if(! $isExists) {
        writeln('git clone');
        $output = run('{{bin/git}} clone {{repository}} {{deploy_path}}');
    } else {
        writeln('git pull');
        cd('{{deploy_path}}');
        $output = run('{{bin/git}} pull');
    }

    writeln($output);
});

task('deploy:down', function () {
    cd('/var/www');
    $output = run('rm -rf {{deploy_path}}');
    writeln($output);

//    cd('/');
//    $output = run('ls -l');
//    writeln($output);
});
