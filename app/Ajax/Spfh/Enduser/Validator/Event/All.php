<?php
namespace App\Ajax\Spfh\Enduser\Validator\Event;

use App\Db;
use App\Core;

class All extends Core\Validator
{
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
    $query->where('event.event_status_id', 1);
    $query->orderBy('event.schedule_at');
  }
}