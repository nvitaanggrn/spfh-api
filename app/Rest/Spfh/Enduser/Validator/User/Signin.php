<?php
namespace App\Rest\Spfh\Enduser\Validator\User;

use App\Ajax;

class Signin extends Ajax\Spfh\Admin\Validator\User\Signin
{
  public function apiSuccessResponse(){
    $response = parent::apiSuccessResponse()->getData();
    $response['token'] = $this->tokenCreator->getResponse();
    return parent::apiSuccessResponse()->data($response);
  }
}