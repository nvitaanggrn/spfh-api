<?php
namespace App\Rest\Spfh\Enduser\Auth;

use Illuminate\Http\Request;
use App\Db;
use App\Core;
use App\Rest;

class AuthService extends Rest\Auth\AuthService
{
  protected $tokenCreatorClass = TokenCreator::class;
  protected $tokenRevokerClass = TokenRevoker::class;

  protected function fetchToken(Request $request){
    $token = parent::fetchToken($request);
    return $token &&
      $token->getVersion() == Db\Spfh\Token::VERSION &&
      $token->getAudience() == Db\Spfh\TokenType::TYPE_BEARER_ID ?
      $token :
      null;
  }

  protected function fetchModel(Core\Auth\Token $token){
    $now = Core\Date::nowFromUtc();
    return Db\Spfh\Token::withColumns()
      ->where('token.user_id', $token->getSubject())
      ->where('token.token_type_id', $token->getAudience())
      ->where('token.oid', $token->getId())
      ->where('token.unique', $token->getUnique())
      ->where('token.token_status_id', Db\Spfh\TokenStatus::STATUS_ACTIVE_ID)
      ->where('token.created_at', '<=', $now)
      ->where('token.expired_at', '>=', $now)
      ->first();
  }

  protected function fetchUser(Core\Auth\ModelInterface $model){
    $userTypeId = Rest\Config::get('auth.model.user_type_id');
    return Db\Spfh\User::withColumns()
      ->where('user.id', $model->getAuthTokenSubject())
      ->where('user.user_type_id', $userTypeId)
      ->where('user.user_status_id', Db\Spfh\UserStatus::STATUS_ACTIVE_ID)
      ->first();
  }
}