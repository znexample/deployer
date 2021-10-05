<?php

namespace Deployer;

task('develop:install', function () {
    writeln('');

    $output = run('uname -a');
    writeln($output);

    writeln('');

    $output = run('{{bin/php}} -v');
    writeln($output);

    writeln('');

    $output = run('{{bin/git}} --version');
    writeln($output);

    writeln('');

//    cd('/');
//    $output = run('ls -l');
//    writeln($output);
});
