<?php
namespace App\Ajax\Spfh\Admin\Validator\Event;

use App\Db;
use App\Core;

class All extends Core\Validator
{
  protected $_stopOnFailure = true;
  protected $_rules = [
    'start_datetime' => 'nullable|date_format:Y-m-d H:i:s',
    'end_datetime' => 'nullable|date_format:Y-m-d H:i:s'
  ];

  public function apiSuccessResponse(){
    $data = $this->fetchData();
    return parent::apiSuccessResponse()->data($data);
  }

  protected function fetchData(){
    $p = $this->getPagination();
    $query = Db\Spfh\Event::withColumns()->offset($p->getSkip())->limit($p->getTake());
    $this->buildJoin($query);
    $this->buildQuery($query);
    return $query->cursor();
  }

  protected function buildJoin($query){
    $query->addSelect('event_status.name as event_status_name');
    $query->leftJoin('event_status', 'event_status.id', 'event.event_status_id');
  }

  protected function buildQuery($query){
    $pStartDatetime = $this->getStringParam('start_datetime');
    if ($pStartDatetime) {
      $query->where('event.schedule_at', '>=', $pStartDatetime);
    }
    $pEndDatetime = $this->getStringParam('end_datetime');
    if ($pEndDatetime) {
      $query->where('event.schedule_at', '<=', $pEndDatetime);
    }
    $query->where('event.event_status_id', 1);
    $query->orderByDesc('event.id');
  }
}