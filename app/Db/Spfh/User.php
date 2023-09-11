<?php
namespace App\Db\Spfh;

use App\Core;

class User extends Model implements Core\Auth\UserInterface
{
  protected $table = 'user';

  protected $columns = [
    'id',
    'user_type_id',
    'user_status_id',
    'nip',
    'password',
    'name',
    'address',
    'group_id'
  ];

  protected $hidden = [
    'password'
  ];

  protected $appends = [
    'group'
  ];

  public function isActive(){
    return $this->user_status_id == UserStatus::STATUS_ACTIVE_ID;
  }

  public function verifyNip($nip){
    return $nip != null && strtolower($nip) === $this->nip;
  }

  public function verifyPassword($password){
    return $password != null && password_verify($password, $this->password);
  }

  protected function getGroupAttribute(){
    return Group::withColumns()->where('group.id', $this->group_id)->first();
  }
}