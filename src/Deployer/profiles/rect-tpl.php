<?php

return [
    'repository' => 'git@github.com:jstpl/my-app.git',
    'branch' => 'develop',
    'deploy_path' => '/var/www/tpl/react',
    'release_path' => '{{deploy_path}}',
    //'release_public_path' => '{{release_path}}/public',
    //'deploy_public_path' => '{{current_path}}/public',

    'deploy_var_path' => '{{deploy_path}}/var',
    'release_var_path' => '{{release_path}}/var',
    //'current_path' => '{{deploy_path}}/current',

    'application' => 'React template',
    'domains' => [
        [
            'domain' => 'react.tpl',
            'directory' => '{{current_path}}/build',
        ],
    ],
    'permissions' => [
        /*[
            'path' => '{{deploy_var_path}}',
        ],*/
    ],
];
