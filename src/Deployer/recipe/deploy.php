<?php

namespace Deployer;

//require_once __DIR__ . '/../../../vendor/deployer/deployer/recipe/common.php';
require_once __DIR__ . '/../../../vendor/zntool/deployer/src/recipe/deploy/release.php';
require_once __DIR__ . '/../../../vendor/zntool/deployer/src/recipe/deploy/vendors.php';
require_once __DIR__ . '/../../../vendor/zntool/deployer/src/recipe/deploy/update_code.php';
require_once __DIR__ . '/../../../vendor/zntool/deployer/src/recipe/deploy/database.php';
require_once __DIR__ . '/../../../vendor/zntool/deployer/src/recipe/deploy/project.php';
require_once __DIR__ . '/../../../vendor/zntool/deployer/src/recipe/deploy/io.php';

// default for deployment is staging
set( 'default_stage', 'staging');

// if we need to run commands on the target server(s) as sudo, change the next line to: set( 'sudo_cmd', 'sudo');
set( 'sudo_cmd', '');

// Project name
set( 'application', 'mysite');

// keep the most recent 10 releases
set( 'keep_releases', 3 );

// this web site pulls from two repositories - the main repo and a secondary repo with a chat client
set( 'repo-main', $_ENV['DEPLOYER_REPOSITORY'] );
set( 'repo-chat-client', 'https://github_username@github.com/github_username/my-chat-client.git');

// allocate tty for git clone - this is if you need to enter a passphrase or whatever to
// authenticate with github. for public repos you probably won't need this, for private
// repos you will almost definitely need this. if you aren't sure, it doesn't hurt to keep
// it turned on.
set( 'git_tty', true );

// allow Deployer tool to collect anonymous statistics about usage
set( 'allow_anonymous_stats', true );

/**
 * define hosts
 */

// note that staging server uses a non-standard port for SSH so I have to specify it here
/*host( $_ENV['DEPLOYER_HOST_IP'] )
    ->user( $_ENV['DEPLOYER_HOST_USER'] )
    ->stage( 'staging')
    ->port( $_ENV['DEPLOYER_HOST_PORT'] )
    ->set( 'deploy_path', $_ENV['DEPLOYER_DEPLOY_PATH'] )
    ->identityFile( $_ENV['DEPLOYER_HOST_IDENTITY_FILE'] );*/

// note that live server also uses a non-standard port for SSH
/*host( 'example.com')
    ->user( 'eric')
    ->stage( 'production')
    ->port( 30122 )
    ->set( 'deploy_path', '/usr/share/nginx/example.com')
    ->identityFile( '~/.ssh/id_rsa');*/


/**
 * define deployer tasks
 * we have broken the tasks down into discrete subtasks
 * and then at the bottom there's one task to call all the subtasks
 */

// check out code from 2nd repo and move it into place
/*task( 'update:code-chat-client', function () {
    // note next line: for this repo, pull from the special 'deploy' branch
    run( "{{sudo_cmd}} git clone -q -b deploy --depth 1 {{repo-chat-client}} {{release_path}}/chat-temp-checkout" );

    // move the entire final/ folder into the html/ tree
    run( "{{sudo_cmd}} mv {{release_path}}/chat-temp-checkout/final {{release_path}}/html/" );

    // get rid of leftovers from the git clone that we no longer need
    run( "{{sudo_cmd}} rm -rf {{release_path}}/chat-temp-checkout" );

    // get rid of non-minified versions of files stored in repo that we don't want on live server
    run( "{{sudo_cmd}} rm -rf {{release_path}}/html/final/master.js" );
    run( "{{sudo_cmd}} rm -rf {{release_path}}/html/final/js/src" );
} );*/

// update filesystem permissions
task( 'update:permissions', function () {
    run( '{{sudo_cmd}} mkdir {{release_path}}/messages/cache');
    run( '{{sudo_cmd}} chmod -R a+w {{release_path}}/messages/cache');

// change the owner to the webserver
    run( '{{sudo_cmd}} chown -R -h nginx:nginx {{release_path}}');
} );

// create internal symlinks in the project
task( 'create:symlinks', function () {
    // links to external storage holding video library
    run( "{{sudo_cmd}} ln -nfs /sdb/storage/videos {{release_path}}" );
} );

// as part of the deployment we need to restart the chat server
// you may also need to restart your web server, just to be safe
//task( 'update:restart_chat_client_server', function () {
//    run( '{{sudo_cmd}} pm2 stop chat-client');
//    run( '{{sudo_cmd}} pm2 start {{release_path}}/html/final/client.min.js --name chat-client');
//} );

// this task runs all the subtasks defined above
task( 'deploy', [
    'confirm',
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
    'notify:done',
] );

// if deployment fails, automatically unlock
after( 'deploy:failed', 'deploy:unlock');











/*require_once __DIR__ . '/../../../vendor/zntool/deployer/src/recipe/deploy.php';

task('deploy:up', [
    //'ssh:connect',
    'deploy:info',
    'deploy:prepare',
//    'deploy:lock',
//    'deploy:release',
    'deploy:update_code',
    'deploy:vendors',
    'project:init',
//    'deploy:shared',
//    'deploy:writable',
    'database:migrate_up',
    'database:fixtures_import',
//    'deploy:symlink',
//    'deploy:unlock',
//    'cleanup',
])->desc('Deploy your project');*/
