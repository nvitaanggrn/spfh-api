<?php
/**
 * /stats
 */
$router->get('all',[
  'as' => 'all',
  'uses' => 'Stats@all',
  'middleware' => [
    'auth.authorized_token'
  ]
]);