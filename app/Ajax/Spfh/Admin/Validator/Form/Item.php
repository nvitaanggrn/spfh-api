<?php
namespace App\Ajax\Spfh\Admin\Validator\Form;

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

  protected function buildJoin($query){
    parent::buildJoin($query);
    $query->addSelect('form_process.datetime as form_process_datetime');
    $query->addSelect('form_process.description as form_process_description');
    $query->leftJoin('form_process', [
      'form_process.form_id' => 'form.id',
      'form_process.form_status_id' => 'form.form_status_id'
    ]);
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