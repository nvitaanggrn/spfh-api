<?php
namespace App\Ajax\Spfh\Enduser\Validator\Form;

use Exception;
use App\Db;

class Delete extends Item
{
  protected $user;

  protected function beforeValidate(){
    $this->user = $this->getAuth()->getUser();
    return true;
  }

  protected function buildQuery($query){
    parent::buildQuery($query);
    $query->where('form.user_id', $this->user->id);
    $query->where('form.form_status_id', 1);
  }

  public function resolve(){
    try {
      Db\Spfh\Form::transaction(function(){
        $this->data->form_status_id = 2;
        $this->data->save();
      });
    } catch (Exception $e) {
      $this->logError($e);
      $this->getValidation()->addWildcardError('error');
      return false;
    }
    return true;
  }
}