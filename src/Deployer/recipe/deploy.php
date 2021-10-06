<?php

namespace Deployer;

//require_once __DIR__ . '/../../../vendor/deployer/deployer/recipe/common.php';
require_once __DIR__ . '/../../../vendor/zntool/deployer/src/recipe/deploy/release.php';
require_once __DIR__ . '/../../../vendor/zntool/deployer/src/recipe/deploy/vendors.php';
require_once __DIR__ . '/../../../vendor/zntool/deployer/src/recipe/deploy/update_code.php';
require_once __DIR__ . '/../../../vendor/zntool/deployer/src/recipe/deploy/database.php';
require_once __DIR__ . '/../../../vendor/zntool/deployer/src/recipe/deploy/project.php';
require_once __DIR__ . '/../../../vendor/zntool/deployer/src/recipe/deploy/io.php';
require_once __DIR__ . '/../../../vendor/zntool/deployer/src/recipe/deploy/benchmark.php';

// default for deployment is staging
set('default_stage', 'staging');

// if we need to run commands on the target server(s) as sudo, change the next line to: set( 'sudo_cmd', 'sudo');
set('sudo_cmd', '');

// Project name
set('application', 'mysite');

// keep the most recent 10 releases
set('keep_releases', 3);

// allocate tty for git clone - this is if you need to enter a passphrase or whatever to
// authenticate with github. for public repos you probably won't need this, for private
// repos you will almost definitely need this. if you aren't sure, it doesn't hurt to keep
// it turned on.
set('git_tty', true);

// allow Deployer tool to collect anonymous statistics about usage
set('allow_anonymous_stats', true);

task('deploy', [
    'confirm',
    'benchmark:start',
    'release:create',
    'code:update',
//    'update:code-chat-client',
//    'update:permissions',
//    'create:symlinks',
    'vendors:composer_install',
    'project:init',
    'database:migrate_up',
    'database:fixtures_import',
    'release:update_symlinks',
//    'update:restart_chat_client_server',
    'release:cleanup',
//    'benchmark:end',
//    'benchmark:total',
    'notify:finished',
]);

// if deployment fails, automatically unlock
after('deploy:failed', 'deploy:unlock');
