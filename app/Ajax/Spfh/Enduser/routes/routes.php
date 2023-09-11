<?php
$router->group([
  'prefix' => '/',
  'namespace' => '\App\Ajax\Spfh\Admin\Controller'
], function($router){
  require_once(__DIR__.'/../../Admin/routes/index.php');
});

$router->group([
  'as' => 'user',
  'prefix' => '/user',
  'namespace' => '\App\Ajax\Spfh\Admin\Controller'
], function($router){
  require_once(__DIR__.'/../../Admin/routes/user.php');
});

$router->group([
  'as' => 'form',
  'prefix' => '/form'
], function($router){
  require_once(__DIR__.'/form.php');
});

$router->group([
  'as' => 'event',
  'prefix' => '/event'
], function($router){
  require_once(__DIR__.'/event.php');
});

$router->group([
  'as' => 'news',
  'prefix' => '/news'
], function($router){
  require_once(__DIR__.'/news.php');
});

$router->group([
  'as' => 'feedback',
  'prefix' => '/feedback'
], function($router){
  require_once(__DIR__.'/feedback.php');
});