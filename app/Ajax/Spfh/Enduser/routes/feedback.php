<?php
/**
 * /feedback
 */
$router->post('create',[
  'as' => 'create',
  'uses' => 'Feedback@create',
  'middleware' => [
    'auth.authorized_token'
  ]
]);