<?php
$router->group([
  'prefix' => '/',
  'namespace' => '\App\Ajax\Spfh\Admin\Controller'
], function($router){
  require_once(__DIR__.'/../../../../Ajax/Spfh/Admin/routes/index.php');
});

$router->group([
  'as' => 'user',
  'prefix' => '/user'
], function($router){
  require_once(__DIR__.'/../../../../Ajax/Spfh/Admin/routes/user.php');
});

$router->group([
  'as' => 'form',
  'prefix' => '/form',
  'namespace' => '\App\Ajax\Spfh\Enduser\Controller'
], function($router){
  require_once(__DIR__.'/../../../../Ajax/Spfh/Enduser/routes/form.php');
});

$router->group([
  'as' => 'event',
  'prefix' => '/event',
  'namespace' => '\App\Ajax\Spfh\Enduser\Controller'
], function($router){
  require_once(__DIR__.'/../../../../Ajax/Spfh/Enduser/routes/event.php');
});

$router->group([
  'as' => 'news',
  'prefix' => '/news',
  'namespace' => '\App\Ajax\Spfh\Enduser\Controller'
], function($router){
  require_once(__DIR__.'/../../../../Ajax/Spfh/Enduser/routes/news.php');
});

$router->group([
  'as' => 'feedback',
  'prefix' => '/feedback',
  'namespace' => '\App\Ajax\Spfh\Enduser\Controller'
], function($router){
  require_once(__DIR__.'/../../../../Ajax/Spfh/Enduser/routes/feedback.php');
});