<?php
namespace App\Db\Spfh;

class TokenType extends Model
{
  const TYPE_BEARER_ID = 1;
  const TYPE_COOKIE_ID = 2;

  protected $table = 'token_type';

  protected $columns = [
    'id',
    'name'
  ];
}