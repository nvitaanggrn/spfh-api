<?php
namespace App\Ajax\Spfh\Admin\Auth;

use Wayang\Stdlib\Oid\Oid563;
use App\Db;
use App\Core;
use App\Ajax;

class TokenCreator extends Ajax\Auth\TokenCreator
{
  protected $lifetime;
  protected $randomType;
  protected $randomLength;

  public function __construct($app, array $options){
    parent::__construct($app, $options);
    $this->lifetime = (int)Ajax\Config::get('auth.model.lifetime');
    $this->randomType = (string)Ajax\Config::get('auth.model.random_type');
    $this->randomLength = (int)Ajax\Config::get('auth.model.random_length');
  }

  protected function createModel(){
    $user = $this->options->get('user');
    $createdAt = Core\Date::nowFromUtc();
    $expiredAt = $createdAt->copy()->addSeconds($this->lifetime);
    $this->model = new Db\Spfh\Token();
    $this->model->user_id = $user->id;
    $this->model->token_type_id = Db\Spfh\TokenType::TYPE_COOKIE_ID;
    $this->model->token_status_id = Db\Spfh\TokenStatus::STATUS_ACTIVE_ID;
    $this->model->version = Db\Spfh\Token::VERSION;
    $this->model->oid = Oid563::create();
    $this->model->unique = Core\Random::create($this->randomType, $this->randomLength);
    $this->model->created_at = $createdAt;
    $this->model->expired_at = $expiredAt;
    $this->model->save();
  }
}