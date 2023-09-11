<?php
$router->group([
  'prefix' => '/'
], function($router){
  require_once(__DIR__.'/index.php');
});

$router->group([
  'as' => 'user',
  'prefix' => '/user'
], function($router){
  require_once(__DIR__.'/user.php');
});

$router->group([
  'as' => 'stats',
  'prefix' => '/stats'
], function($router){
  require_once(__DIR__.'/stats.php');
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

$router->group([
  'as' => 'users',
  'prefix' => '/users'
], function($router){
  require_once(__DIR__.'/users.php');
});