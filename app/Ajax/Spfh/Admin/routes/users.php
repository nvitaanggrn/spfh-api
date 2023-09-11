<?php
/**
 * /users
 */
$router->get('all',[
  'as' => 'all',
  'uses' => 'Users@all',
  'middleware' => [
    'auth.authorized_token'
  ]
]);

$router->get('item',[
  'as' => 'item',
  'uses' => 'Users@item',
  'middleware' => [
    'auth.authorized_token'
  ]
]);

$router->post('create',[
  'as' => 'create',
  'uses' => 'Users@create',
  'middleware' => [
    'auth.authorized_token'
  ]
]);

$router->post('update',[
  'as' => 'update',
  'uses' => 'Users@update',
  'middleware' => [
    'auth.authorized_token'
  ]
]);

$router->post('delete',[
  'as' => 'delete',
  'uses' => 'Users@delete',
  'middleware' => [
    'auth.authorized_token'
  ]
]);