<?php
namespace App\Ajax\Spfh\Enduser;

use App\Ajax;

class Application extends Ajax\Application
{
  protected $routePath = 'app/Ajax/Spfh/Enduser/routes/routes.php';
  protected $routeNamespace = 'App\\Ajax\\Spfh\\Enduser\\Controller';
}