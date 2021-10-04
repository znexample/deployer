<?php

namespace Deployer;

//{{bin/git}}

task('deploy:up', [
    'deploy:info',
    'deploy:prepare',
//    'deploy:lock',
//    'deploy:release',
    'deploy:update_code',
    'deploy:vendors',
    'deploy:init',
//    'deploy:shared',
//    'deploy:writable',
    'deploy:run_migrations',
//    'deploy:symlink',
//    'deploy:unlock',
//    'cleanup',
])->desc('Deploy your project');

//after('deploy', 'success');

task('deploy:init', function () {
    cd('{{release_path}}/vendor/bin');
    run('{{bin/php}} zn init --env=Ci --overwrite=All');
})->desc('Initialization');

task('deploy:run_migrations', function () {
    cd('{{release_path}}/vendor/bin');
    $output = run('{{bin/php}} zn db:migrate:up');
    writeln($output);
})->desc('Run migrations');

task('deploy:prepare', function () {
    run("if [ ! -d {{deploy_path}} ]; then mkdir -p {{deploy_path}}; fi");
    $isExists = test("[ -f {{deploy_path}}/.env ]");
    cd('{{deploy_path}}');
    if(! $isExists) {
        writeln('git clone');
        $output = run('{{bin/git}} clone {{repository}} {{deploy_path}}');
    }
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
