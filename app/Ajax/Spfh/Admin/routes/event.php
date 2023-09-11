<?php
/**
 * /event
 */
$router->get('all',[
  'as' => 'all',
  'uses' => 'Event@all',
  'middleware' => [
    'auth.authorized_token'
  ]
]);

$router->get('item',[
  'as' => 'item',
  'uses' => 'Event@item',
  'middleware' => [
    'auth.authorized_token'
  ]
]);

$router->post('create',[
  'as' => 'create',
  'uses' => 'Event@create',
  'middleware' => [
    'auth.authorized_token'
  ]
]);

$router->post('delete',[
  'as' => 'delete',
  'uses' => 'Event@delete',
  'middleware' => [
    'auth.authorized_token'
  ]
]);