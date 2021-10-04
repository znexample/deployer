<?php

namespace Deployer;

task('develop:install', function () {
    $output = run('php -v');
    writeln($output);

    $output = run('git --version');
    writeln($output);
//    cd('/');
//    $output = run('ls -l');
//    writeln($output);
});
