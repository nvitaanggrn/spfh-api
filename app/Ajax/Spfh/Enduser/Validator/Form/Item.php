<?php
namespace App\Ajax\Spfh\Enduser\Validator\Form;

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
      $this->getValidation()->addError('form', 'exists');
      return false;
    }
    $this->data = $data;
    return true;
  }

  public function apiSuccessResponse(){
    return parent::apiSuccessResponse()->data($this->data);
  }

  protected function fetchData(){
    $query = Db\Spfh\Form::withColumns();
    $this->buildJoin($query);
    $this->buildQuery($query);
    return $query->first();
  }

  protected function buildQuery($query){
    $pId = $this->getDigitParam('id');
    $query->where('form.id', $pId);
    $query->where('form.form_status_id', '<>', 2);
  }
}