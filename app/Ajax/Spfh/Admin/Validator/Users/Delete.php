<?php
namespace App\Ajax\Spfh\Admin\Validator\Users;

use Exception;
use App\Db;

class Delete extends Item
{
  public function resolve(){
    try {
      Db\Spfh\User::transaction(function(){
        $this->data->user_status_id = 2;
        $this->data->save();
      });
    } catch (Exception $e) {
      $this->logError($e);
      $this->getValidation()->addWildcardError('error');
      return false;
    }
    return true;
  }
}