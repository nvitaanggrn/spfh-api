<?php
namespace App\Ajax\Spfh\Admin\Validator\User;

use Exception;
use App\Db;
use App\Core;

class Signout extends Core\Validator
{
  public function resolve(){
    try {
      Db\Spfh\User::transaction(function(){
        $auth = $this->getAuth();
        $tokenRevoker = $auth->createTokenRevoker([
          'user' => $auth->getUser(),
          'model' => $auth->getModel()
        ]);
        $tokenRevoker->revoke();
      });
    } catch (Exception $e) {
      $this->logError($e);
      $this->getValidation()->addWildcardError('error');
      return false;
    }
    return true;
  }
}