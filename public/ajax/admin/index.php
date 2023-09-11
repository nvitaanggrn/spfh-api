<?php
define('APP_PACKAGE_TYPE', 'ajax');
define('APP_PACKAGE_NAME', 'admin');
require_once __DIR__.'/../../../vendor/autoload.php';
$app = new App\Ajax\Spfh\Admin\Application(__DIR__.'/../../..');
$app->run();