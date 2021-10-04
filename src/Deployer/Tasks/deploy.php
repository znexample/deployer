<?php

namespace Deployer;

task('deploy:up', function () {
    cd('/var/www');
    $output = run('ls -l');
    if(strpos($output, 'telegram-bot') === false) {
        writeln('git clone');
        $output = run('git clone git@github.com:zntpl/telegram-bot.git');
    } else {
        writeln('git pull');
        cd('/var/www/telegram-bot');
        $output = run('git pull');
    }
});

task('deploy:down', function () {
    cd('/var/www');
    $output = run('rm -rf telegram-bot');
    writeln($output);

//    cd('/');
//    $output = run('ls -l');
//    writeln($output);
});
