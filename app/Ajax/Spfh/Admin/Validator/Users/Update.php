<?php
namespace App\Ajax\Spfh\Admin\Validator\Users;

use Exception;
use App\Db;

class Update extends Item
{
  protected $_stopOnFailure = true;
  protected $_rules = [
    'id' => 'required|numeric',
    'name' => 'required|string|max:255',
    'address' => 'nullable|string|max:510',
    'group' => 'required|numeric',
    'password' => 'nullable|string|confirmed'
  ];

  protected $name;
  protected $group;
  protected $password;

  protected function afterValidate(){
    return parent::afterValidate() && $this->validateName() && $this->validateGroup() && $this->validatePassword();
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
        $this->data->name = $this->name;
        $this->data->address = $this->getStringParam('address');
        $this->data->group_id = $this->group->id;
        if ($this->password) {
          $this->data->password = $this->password;
        }
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