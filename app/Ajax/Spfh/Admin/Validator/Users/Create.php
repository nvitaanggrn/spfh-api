<?php
namespace App\Ajax\Spfh\Admin\Validator\Users;

use Exception;
use App\Db;
use App\Core;

class Create extends Core\Validator
{
  protected $_stopOnFailure = true;
  protected $_rules = [
    'type' => 'required|in:1,2',
    'nip' => 'required|numeric',
    'group' => 'required|numeric',
    'password' => 'required|string|confirmed',
    'name' => 'required|string|max:255',
    'address' => 'nullable|string|max:510'
  ];

  protected $nip;
  protected $name;
  protected $group;
  protected $password;
  protected $userTypeId;

  protected function afterValidate(){
    return $this->validateNip() && $this->validateName() && $this->validateGroup() && $this->validatePassword();
  }

  protected function validateNip(){
    $pNip = $this->getDigitParam('nip');
    $pType = $this->getDigitParam('type');
    $isNipExists = Db\Spfh\User::selectRaw(1)
      ->where('user.nip', $pNip)
      ->where('user.user_type_id', $pType)
      ->where('user.user_status_id', 1)
      ->exists();
    if ($isNipExists) {
      $this->getValidation()->addError('nip', 'unique');
      return false;
    }
    $this->nip = $pNip;
    $this->userTypeId = $pType;
    return true;
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
    $this->password = password_hash($pPassword, PASSWORD_BCRYPT);
    return true;
  }

  public function resolve(){
    try {
      Db\Spfh\User::transaction(function(){
        $user = new Db\Spfh\User();
        $user->user_type_id = $this->userTypeId;
        $user->user_status_id = Db\Spfh\UserStatus::STATUS_ACTIVE_ID;
        $user->nip = $this->nip;
        $user->password = $this->password;
        $user->name = $this->name;
        $user->address = $this->getStringParam('address');
        $user->group_id = $this->group->id;
        $user->save();
      });
    } catch (Exception $e) {
      $this->logError($e);
      $this->getValidation()->addWildcardError('error');
      return false;
    }
    return true;
  }
}