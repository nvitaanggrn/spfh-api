<?php
namespace App\Ajax\Spfh\Admin\Auth;

use App\Db;
use App\Core;
use App\Ajax;

class TokenRevoker extends Ajax\Auth\TokenRevoker
{
  protected function revokeModel(){
    $model = $this->options->get('model');
    $this->model = $model;
    $this->model->revoked_at = Core\Date::nowFromUtc();
    $this->model->token_status_id = Db\Spfh\TokenStatus::STATUS_REVOKED_ID;
    $this->model->save();
  }
}