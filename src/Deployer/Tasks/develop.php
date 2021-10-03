<?php

namespace Deployer;

task('develop:install', function () {
    cd('/');
    $output = run('ls -l');
    writeln($output);
});
