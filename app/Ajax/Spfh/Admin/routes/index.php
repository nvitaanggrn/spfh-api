<?php
/**
 * /
 */
$router->get('who',[
  'as' => 'who',
  'uses' => 'Index@who'
]);

$router->get('ping',[
  'as' => 'ping',
  'uses' => 'Index@ping'
]);