<?php
namespace App\Ajax\Spfh\Enduser\Validator\News;

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
      $this->getValidation()->addError('news', 'exists');
      return false;
    }
    $this->data = $data;
    return true;
  }

  public function apiSuccessResponse(){
    return parent::apiSuccessResponse()->data($this->data);
  }

  protected function fetchData(){
    $query = Db\Spfh\News::withColumns();
    $this->buildJoin($query);
    $this->buildQuery($query);
    return $query->first();
  }

  protected function buildQuery($query){
    $pId = $this->getDigitParam('id');
    $query->where('news.id', $pId);
    $query->where('news.news_status_id', 1);
  }
}