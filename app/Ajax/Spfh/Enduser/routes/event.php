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