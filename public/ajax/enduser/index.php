<?php
define('APP_PACKAGE_TYPE', 'ajax');
define('APP_PACKAGE_NAME', 'enduser');
require_once __DIR__.'/../../../vendor/autoload.php';
$app = new App\Ajax\Spfh\Enduser\Application(__DIR__.'/../../..');
$app->run();