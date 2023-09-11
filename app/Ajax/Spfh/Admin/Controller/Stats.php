<?php
namespace App\Ajax\Spfh\Admin\Controller;

use Illuminate\Http\Request;
use App\Core;
use App\Ajax;

class Stats extends Core\Controller
{
  public function all(Request $request){
    $all = new Ajax\Spfh\Admin\Validator\Stats\All($request);
    if ($all->validate()) {
      return $all->apiSuccessResponse()->build();
    }
    return $all->apiErrorResponse()->build();
  }
}