<?php

namespace Deployer;

task('develop:install', function () {
    $output = run('{{bin/php}} -v');
    writeln($output);

    $output = run('{{bin/git}} --version');
    writeln($output);
//    cd('/');
//    $output = run('ls -l');
//    writeln($output);
});
