<?php
namespace App\Ajax\Spfh\Enduser\Controller;

use Illuminate\Http\Request;
use App\Core;
use App\Ajax;

class Event extends Core\Controller
{
  public function all(Request $request){
    $all = new Ajax\Spfh\Enduser\Validator\Event\All($request);
    if ($all->validate()) {
      return $all->apiSuccessResponse()->build();
    }
    return $all->apiErrorResponse()->build();
  }
}