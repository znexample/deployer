<?php

namespace Deployer;

host($_ENV['DEPLOYER_HOST_IP'])
    ->user($_ENV['DEPLOYER_HOST_USER'])
    ->port($_ENV['DEPLOYER_HOST_PORT'])
    //->identityFile('~/.ssh/deployerkey')
    //->set('deploy_path', '/var/www/html/laravel-app')
;
