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

$router->post('create',[
  'as' => 'create',
  'uses' => 'News@create',
  'middleware' => [
    'auth.authorized_token'
  ]
]);

$router->post('update',[
  'as' => 'update',
  'uses' => 'News@update',
  'middleware' => [
    'auth.authorized_token'
  ]
]);

$router->post('delete',[
  'as' => 'delete',
  'uses' => 'News@delete',
  'middleware' => [
    'auth.authorized_token'
  ]
]);