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

$router->get('update',[
  'as' => 'update',
  'uses' => 'Form@update',
  'middleware' => [
    'auth.authorized_token'
  ]
]);

$router->get('datapdf',[
  'as' => 'datapdf',
  'uses' => 'Form@datapdf',
  'middleware' => [
    'auth.authorized_token'
  ]
]);

$router->get('viewpdf',[
  'as' => 'viewpdf',
  'uses' => 'Form@viewpdf',
  'middleware' => [
    'auth.authorized_token'
  ]
]);