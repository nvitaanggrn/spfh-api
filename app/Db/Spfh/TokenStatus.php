<?php
namespace App\Db\Spfh;

class TokenStatus extends Model
{
  const STATUS_ACTIVE_ID = 1;
  const STATUS_REVOKED_ID = 2;
  const STATUS_REFRESHED_ID = 3;

  protected $table = 'token_status';

  protected $columns = [
    'id',
    'name'
  ];
}