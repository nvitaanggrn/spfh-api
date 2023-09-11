<?php
/**
 * /news
 */
$router->get('all',[
  'as' => 'all',
  'uses' => 'News@all',
  'middleware' => [
    'auth.authorized_token'
  ]
]);

$router->get('item',[
  'as' => 'item',
  'uses' => 'News@item',
  'middleware' => [
    'auth.authorized_token'
  ]
]);