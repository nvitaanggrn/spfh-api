<?php
namespace App\Db\Spfh;

class UserStatus extends Model
{
  const STATUS_ACTIVE_ID = 1;
  const STATUS_REMOVED_ID = 2;

  protected $table = 'user_status';

  protected $columns = [
    'id',
    'name'
  ];
}