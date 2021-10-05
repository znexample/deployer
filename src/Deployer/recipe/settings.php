<?php

namespace Deployer;

require_once __DIR__ . '/../../../vendor/zntool/deployer/src/recipe/settings.php';

task('settings:up', [
    //'ssh:connect_by_root',
    //'settings:runSshAgent',
//    'settings:authSsh',
    'settings:gitSsh',
    'settings:gitSshInfo',
])->desc('Settings up');
