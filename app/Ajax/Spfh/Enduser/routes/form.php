<?php
/**
 * /form
 */
$router->get('all',[
  'as' => 'all',
  'uses' => 'Form@all',
  'middleware' => [
    'auth.authorized_token'
  ]
]);

$router->get('item',[
  'as' => 'item',
  'uses' => 'Form@item',
  'middleware' => [
    'auth.authorized_token'
  ]
]);

$router->post('create',[
  'as' => 'create',
  'uses' => 'Form@create',
  'middleware' => [
    'auth.authorized_token'
  ]
]);

$router->get('delete',[
  'as' => 'delete',
  'uses' => 'Form@delete',
  'middleware' => [
    'auth.authorized_token'
  ]
]);