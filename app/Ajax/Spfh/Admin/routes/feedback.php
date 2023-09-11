<?php
/**
 * /feedback
 */
$router->get('all',[
  'as' => 'all',
  'uses' => 'Feedback@all',
  'middleware' => [
    'auth.authorized_token'
  ]
]);

$router->get('item',[
  'as' => 'item',
  'uses' => 'Feedback@item',
  'middleware' => [
    'auth.authorized_token'
  ]
]);

$router->post('delete',[
  'as' => 'delete',
  'uses' => 'Feedback@delete',
  'middleware' => [
    'auth.authorized_token'
  ]
]);