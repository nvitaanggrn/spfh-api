<?php
namespace App\Ajax\Spfh\Admin\Validator\Users;

use App\Db;

class Item extends All
{
  protected $_stopOnFailure = true;
  protected $_rules = [
    'id' => 'required|numeric'
  ];

  protected $data;

  protected function afterValidate(){
    $data = $this->fetchData();
    if (!$data) {
      $this->getValidation()->addError('user', 'exists');
      return false;
    }
    $this->data = $data;
    return true;
  }

  public function apiSuccessResponse(){
    return parent::apiSuccessResponse()->data($this->data);
  }

  protected function fetchData(){
    $query = Db\Spfh\User::withColumns();
    $this->buildJoin($query);
    $this->buildQuery($query);
    return $query->first();
  }

  protected function buildQuery($query){
    $pId = $this->getDigitParam('id');
    $user = $this->getAuth()->getUser();
    $query->where('user.id', $pId);
    $query->where('user.id', '<>', $user->id);
    $query->where('user.user_status_id', 1);
  }
}