<?php
namespace App\Db\Spfh;

use App\Core;

class Token extends Model implements Core\Auth\ModelInterface
{
  const VERSION = 0x01;
  const AUTHORIZED = 0x01;
  const UNAUTHORIZED = 0x02;

  protected $table = 'token';

  protected $columns = [
    'user_id',
    'token_type_id',
    'oid',
    'unique',
    'token_status_id',
    'version',
    'created_at',
    'expired_at',
    'revoked_at',
    'refreshed_at'
  ];

  protected $columnKeys = [
    'user_id',
    'token_type_id',
    'oid',
    'unique'
  ];

  protected $casts = [
    'created_at' => 'datetime',
    'expired_at' => 'datetime',
    'revoked_at' => 'datetime',
    'refreshed_at' => 'datetime'
  ];

  protected $tokenType;
  protected $tokenStatus;

  public function tokenType(){
    return TokenType::withColumns()
      ->where('token_type.id', $this->token_type_id);
  }

  public function getTokenType(){
    if ($this->tokenType === null) {
      $this->tokenType = $this->tokenType()->first();
    }
    return $this->tokenType;
  }

  public function tokenStatus(){
    return TokenStatus::withColumns()
      ->where('token_status_id.id', $this->token_status_id);
  }

  public function getTokenStatus(){
    if ($this->tokenStatus === null) {
      $this->tokenStatus = $this->tokenStatus()->first();
    }
    return $this->tokenStatus;
  }

  public function getAuthTokenId(){
    return $this->oid;
  }

  public function getAuthTokenIssuer(){
    return $this->user_id;
  }

  public function getAuthTokenSubject(){
    return $this->user_id;
  }

  public function getAuthTokenAudience(){
    return $this->token_type_id;
  }

  public function getAuthTokenUnique(){
    return $this->unique;
  }

  public function getAuthTokenVersion(){
    return $this->version;
  }

  public function getAuthTokenCreatedAt(){
    return $this->created_at;
  }

  public function getAuthTokenExpiredAt(){
    return $this->expired_at;
  }
}