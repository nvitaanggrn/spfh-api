<?php
namespace App\Rest\Spfh\Enduser\Auth;

use App\Db;
use App\Core;
use App\Rest;

class TokenRevoker extends Rest\Auth\TokenRevoker
{
  protected function revokeModel(){
    $model = $this->options->get('model');
    $this->model = $model;
    $this->model->revoked_at = Core\Date::nowFromUtc();
    $this->model->token_status_id = Db\Spfh\TokenStatus::STATUS_REVOKED_ID;
    $this->model->save();
  }
}