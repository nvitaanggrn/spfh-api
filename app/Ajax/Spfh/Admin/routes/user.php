<?php
/**
 * /user
 */
$router->post('auth',[
  'as' => 'auth',
  'uses' => 'User@auth',
  'middleware' => [
    'auth.token'
  ]
]);

$router->post('update',[
  'as' => 'update',
  'uses' => 'User@update',
  'middleware' => [
    'auth.authorized_token'
  ]
]);

$router->post('signin',[
  'as' => 'signin',
  'uses' => 'User@signin',
  'middleware' => [
    'auth.unauthorized_token'
  ]
]);

$router->post('signup',[
  'as' => 'signup',
  'uses' => 'User@signup',
  'middleware' => [
    'auth.unauthorized_token'
  ]
]);

$router->post('signout',[
  'as' => 'signout',
  'uses' => 'User@signout',
  'middleware' => [
    'auth.authorized_token'
  ]
]);