<?php
namespace App\Ajax\Spfh\Admin\Validator\User;

use Exception;
use App\Db;
use App\Core;

class Update extends Core\Validator
{
  protected $_stopOnFailure = true;
  protected $_rules = [
    'name' => 'required|string|max:255',
    'group' => 'required|numeric',
    'address' => 'nullable|string|max:510',
    'password' => 'nullable|string|confirmed'
  ];

  protected $user;
  protected $name;
  protected $group;
  protected $password;

  protected function afterValidate(){
    return $this->validateName() && $this->validateGroup() && $this->validatePassword();
  }

  protected function validateName(){
    $pName = $this->getStringParam('name');
    $parts = preg_split('/\s+/', $pName);
    $this->name = implode(' ', $parts);
    return true;
  }

  protected function validateGroup(){
    $pGroup = $this->getDigitParam('group');
    $mGroup = Db\Spfh\Group::withColumns()
      ->where('group.id', $pGroup)
      ->first();
    if (!$mGroup) {
      $this->getValidation()->addError('group', 'exists');
      return false;
    }
    $this->group = $mGroup;
    return true;
  }

  protected function validatePassword(){
    $pPassword = $this->getParam('password');
    if ($pPassword != null) {
      $this->password = password_hash($pPassword, PASSWORD_BCRYPT);
    }
    return true;
  }

  public function resolve(){
    try {
      Db\Spfh\User::transaction(function(){
        $this->user = $this->getAuth()->getUser();
        $this->user->name = $this->name;
        $this->user->address = $this->getStringParam('address');
        $this->user->group_id = $this->group->id;
        if ($this->password) {
          $this->user->password = $this->password;
        }
        $this->user->save();
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