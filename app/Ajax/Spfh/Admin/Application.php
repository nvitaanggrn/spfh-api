<?php
namespace App\Ajax\Spfh\Admin;

use App\Ajax;

class Application extends Ajax\Application
{
  protected $routePath = 'app/Ajax/Spfh/Admin/routes/routes.php';
  protected $routeNamespace = 'App\\Ajax\\Spfh\\Admin\\Controller';
}