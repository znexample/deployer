<?php

namespace Deployer;

use ZnCore\Base\Helpers\TempHelper;
use ZnCore\Base\Legacy\Yii\Helpers\FileHelper;

task('settings:up', [
    'settings:authSsh',
//    'settings:gitSsh',
])->desc('Settings up');

set('ssh_directory', '/home/vitaliy/.ssh');

task('settings:authSsh', function () {
    $isExists = isFileExists("~/.ssh/authorized_keys");
    if (!$isExists) {
        upload('{{ssh_directory}}/ubuntu_server.pub', '~/.ssh/authorized_keys');
        writeln("auth key installed!");
    }
});

task('settings:gitSsh', function () {
    run('eval $(ssh-agent)');
    if (!isFileExists('~/.ssh/config')) {
        upload('{{ssh_directory}}/config', '~/.ssh/config');
    }
    uploadKey('my-github');
    uploadKey('my-gitlab');

//    run('ssh-add ~/.ssh/my-gitlab');
//    run('ssh-add ~/.ssh/my-github');
});

task('settings:gitSshInfo', function () {
    cd('~/.ssh');
    $output = run('ls -l');
    writeln($output);

    $output = run('ssh-add -l');
    writeln($output);
});

