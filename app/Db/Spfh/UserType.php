<?php
namespace App\Db\Spfh;

class UserType extends Model
{
  const TYPE_ADMIN_ID = 1;
  const TYPE_ENDUSER_ID = 2;

  protected $table = 'user_type';

  protected $columns = [
    'id',
    'name'
  ];
}