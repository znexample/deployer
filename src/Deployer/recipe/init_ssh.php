<?php

namespace Deployer;

$host = host($_ENV['DEPLOYER_HOST_IP']);
$host->user($_ENV['DEPLOYER_HOST_USER']);
$host->port($_ENV['DEPLOYER_HOST_PORT']);
if(isset($_ENV['DEPLOYER_HOST_IDENTITY_FILE'])) {
    $host->identityFile($_ENV['DEPLOYER_HOST_IDENTITY_FILE']);
}

//->set('deploy_path', '/var/www/html/laravel-app')
