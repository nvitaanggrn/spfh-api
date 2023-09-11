<?php
namespace App\Rest\Spfh\Enduser\Controller;

use Illuminate\Http\Request;
use App\Ajax;
use App\Rest;

class User extends Ajax\Spfh\Admin\Controller\User
{
  public function signin(Request $request){
    $signin = new Rest\Spfh\Enduser\Validator\User\Signin($request);
    if ($signin->validate() && $signin->resolve()) {
      return $signin->apiSuccessResponse()->build();
    }
    return $signin->apiErrorResponse()->build();
  }
}