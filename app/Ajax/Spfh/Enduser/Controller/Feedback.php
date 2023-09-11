<?php
namespace App\Ajax\Spfh\Enduser\Controller;

use Illuminate\Http\Request;
use App\Core;
use App\Ajax;

class Feedback extends Core\Controller
{
  public function create(Request $request){
    $create = new Ajax\Spfh\Enduser\Validator\Feedback\Create($request);
    if ($create->validate() && $create->resolve()) {
      return $create->apiSuccessResponse()->build();
    }
    return $create->apiErrorResponse()->build();
  }
}