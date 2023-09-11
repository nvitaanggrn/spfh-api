<?php
namespace App\Rest\Spfh\Enduser;

use App\Rest;

class Application extends Rest\Application
{
  protected $routePath = 'app/Rest/Spfh/Enduser/routes/routes.php';
  protected $routeNamespace = 'App\\Rest\\Spfh\\Enduser\\Controller';

  protected function bootstrapContainer(){
    parent::bootstrapContainer();
    $this->configure('ajax');
  }
}