<?php
namespace App\Ajax\Spfh\Admin\Validator\User;

use App\Db;
use App\Core;

class Auth extends Core\Validator
{
  public function apiSuccessResponse(){
    $response = $this->getAuth()->isAuthorized() ?
      $this->buildAuthorizedDataResponse() :
      $this->buildUnauthorizedDataResponse();
    return parent::apiSuccessResponse()->data($response);
  }

  protected function buildAuthorizedDataResponse(){
    $response['user'] = $this->getAuth()->getUser();
    $response['status'] = Db\Spfh\Token::AUTHORIZED;
    return $response;
  }

  protected function buildUnauthorizedDataResponse(){
    $response['status'] = Db\Spfh\Token::UNAUTHORIZED;
    return $response;
  }
}