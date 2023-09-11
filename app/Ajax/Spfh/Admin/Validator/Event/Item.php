<?php
namespace App\Ajax\Spfh\Admin\Validator\Event;

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
      $this->getValidation()->addError('event', 'exists');
      return false;
    }
    $this->data = $data;
    return true;
  }

  public function apiSuccessResponse(){
    return parent::apiSuccessResponse()->data($this->data);
  }

  protected function fetchData(){
    $query = Db\Spfh\Event::withColumns();
    $this->buildJoin($query);
    $this->buildQuery($query);
    return $query->first();
  }

  protected function buildQuery($query){
    $pId = $this->getDigitParam('id');
    $query->where('event.id', $pId);
    $query->where('event.event_status_id', 1);
  }
}