<?php
namespace App\Ajax\Spfh\Admin\Validator\News;

use App\Db;
use App\Core;

class All extends Core\Validator
{
  protected $_stopOnFailure = true;
  protected $_rules = [
    'search' => 'nullable|string|max:255',
    'category' => 'nullable|numeric',
    'start_datetime' => 'nullable|date_format:Y-m-d H:i:s',
    'end_datetime' => 'nullable|date_format:Y-m-d H:i:s'
  ];

  public function apiSuccessResponse(){
    $data = $this->fetchData();
    return parent::apiSuccessResponse()->data($data);
  }

  protected function fetchData(){
    $p = $this->getPagination();
    $query = Db\Spfh\News::withColumns()->offset($p->getSkip())->limit($p->getTake());
    $this->buildJoin($query);
    $this->buildQuery($query);
    return $query->cursor();
  }

  protected function buildJoin($query){
    $query->addSelect('category.name as category_name');
    $query->leftJoin('category', 'category.id', 'news.category_id');
    $query->addSelect('news_status.name as news_status_name');
    $query->leftJoin('news_status', 'news_status.id', 'news.news_status_id');
  }

  protected function buildQuery($query){
    $pSearch = $this->getStringParam('search');
    if ($pSearch) {
      $pSearch = '%'.$query->getModel()->escapeMatchValue($pSearch).'%';
      $query->where('news.title', 'ILIKE', $pSearch);
    }
    $pCategory = $this->getDigitParam('category');
    if ($pCategory) {
      $query->where('news.category_id', $pCategory);
    }
    $pStartDatetime = $this->getStringParam('start_datetime');
    if ($pStartDatetime) {
      $query->where('news.datetime', '>=', $pStartDatetime);
    }
    $pEndDatetime = $this->getStringParam('end_datetime');
    if ($pEndDatetime) {
      $query->where('news.datetime', '<=', $pEndDatetime);
    }
    $query->where('news.news_status_id', 1);
    $query->orderByDesc('news.id');
  }
}