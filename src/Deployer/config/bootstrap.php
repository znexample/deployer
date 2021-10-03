<?php

use Symfony\Component\Dotenv\Dotenv;

require_once __DIR__ . '/../../../vendor/autoload.php';

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/../../../.env');
if (file_exists(__DIR__ . '/../../../.env.local')) {
    $dotenv->overload(__DIR__ . '/../../../.env.local');
}
