<?php
namespace App\Ajax\Spfh\Admin\Controller;

use Illuminate\Http\Request;
use App\Core;
use App\Ajax;

class User extends Core\Controller
{
  public function auth(Request $request){
    $auth = new Ajax\Spfh\Admin\Validator\User\Auth($request);
    if ($auth->validate()) {
      return $auth->apiSuccessResponse()->build();
    }
    return $auth->apiErrorResponse()->build();
  }

  public function update(Request $request){
    $update = new Ajax\Spfh\Admin\Validator\User\Update($request);
    if ($update->validate() && $update->resolve()) {
      return $update->apiSuccessResponse()->build();
    }
    return $update->apiErrorResponse()->build();
  }

  public function signin(Request $request){
    $signin = new Ajax\Spfh\Admin\Validator\User\Signin($request);
    if ($signin->validate() && $signin->resolve()) {
      return $signin->apiSuccessResponse()->build();
    }
    return $signin->apiErrorResponse()->build();
  }

  public function signup(Request $request){
    $signup = new Ajax\Spfh\Admin\Validator\User\Signup($request);
    if ($signup->validate() && $signup->resolve()) {
      return $signup->apiSuccessResponse()->build();
    }
    return $signup->apiErrorResponse()->build();
  }

  public function signout(Request $request){
    $signout = new Ajax\Spfh\Admin\Validator\User\Signout($request);
    if ($signout->validate() && $signout->resolve()) {
      return $signout->apiSuccessResponse()->build();
    }
    return $signout->apiErrorResponse()->build();
  }
}