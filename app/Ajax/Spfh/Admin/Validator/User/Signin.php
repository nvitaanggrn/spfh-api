<?php
namespace App\Ajax\Spfh\Admin\Validator\User;

use Exception;
use App\Db;
use App\Core;
use App\Ajax;

class Signin extends Core\Validator
{
  protected $_stopOnFailure = true;
  protected $_rules = [
    'nip' => 'required|numeric',
    'password' => 'required|string'
  ];

  protected $user;
  protected $tokenCreator;

  protected function afterValidate(){
    return $this->validateIdentity() && $this->validatePassword();
  }

  protected function validateIdentity(){
    $pNip = $this->getDigitParam('nip');
    $userTypeId = Ajax\Config::get('auth.model.user_type_id');
    $user = Db\Spfh\User::withColumns()
      ->where('user.nip', $pNip)
      ->where('user.user_type_id', $userTypeId)
      ->where('user.user_status_id', Db\Spfh\UserStatus::STATUS_ACTIVE_ID)
      ->first();
    if (!$user) {
      $this->getValidation()->addWildcardError('signin');
      return false;
    }
    $this->user = $user;
    return true;
  }

  protected function validatePassword(){
    $pPassword = $this->getParam('password');
    $hasPassword = $this->user->verifyPassword($pPassword);
    if (!$hasPassword) {
      $this->getValidation()->addWildcardError('signin');
      return false;
    }
    return true;
  }

  public function resolve(){
    try {
      Db\Spfh\User::transaction(function(){
        $this->tokenCreator = $this->getAuth()->createTokenCreator([
          'user' => $this->user
        ]);
        $this->tokenCreator->create();
      });
    } catch (Exception $e) {
      $this->logError($e);
      $this->getValidation()->addWildcardError('error');
      return false;
    }
    return true;
  }

  public function apiSuccessResponse(){
    $response['user'] = $this->user;
    $response['status'] = Db\Spfh\Token::AUTHORIZED;
    return parent::apiSuccessResponse()->data($response);
  }
}