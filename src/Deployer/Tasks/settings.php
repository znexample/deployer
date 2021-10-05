<?php

namespace Deployer;

use ZnCore\Base\Helpers\TempHelper;
use ZnCore\Base\Legacy\Yii\Helpers\FileHelper;

task('settings:up', [
    //'ssh:connect_by_root',
    'settings:runSshAgent',
    'settings:authSsh',
    'settings:gitSsh',
    'settings:gitSshInfo',
])->desc('Settings up');

set('ssh_directory', '/home/vitaliy/.ssh');

task('settings:runSshAgent', function () {
    run('eval $(ssh-agent)');
/*    run('if ps -p $SSH_AGENT_PID > /dev/null
then
   echo "ssh-agent is already running"
else
    eval $(ssh-agent)
fi');*/
});

task('settings:authSsh', function () {
    $isUploaded = uploadIfNotExist('{{ssh_directory}}/ubuntu_server.pub', '~/.ssh/authorized_keys');
    /*$isExists = isFileExists("~/.ssh/authorized_keys");*/
    if ($isUploaded) {
        writeln("auth key installed!");
    }
});

task('settings:gitSsh', function () {
    if (!isFileExists('~/.ssh/config')) {
        upload('{{ssh_directory}}/config', '~/.ssh/config');
    }
    uploadKey('my-github');
    uploadKey('my-gitlab');

//    run('ssh-add ~/.ssh/my-gitlab');
//    run('ssh-add ~/.ssh/my-github');
});

task('settings:gitSshInfo', function () {
    /*cd('~/.ssh');
    $output = run('ls -l');
    writeln($output);*/

    $output = run('ssh-add -l');
    writeln($output);
});
