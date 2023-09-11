<?php
namespace App\Ajax\Spfh\Enduser\Validator\Form;

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
    $query = Db\Spfh\Form::withColumns()->offset($p->getSkip())->limit($p->getTake());
    $this->buildJoin($query);
    $this->buildQuery($query);
    return $query->cursor();
  }

  protected function buildJoin($query){
    $query->addSelect('user.nip as user_nip');
    $query->addSelect('user.name as user_name');
    $query->leftJoin('user', 'user.id', 'form.user_id');
    $query->addSelect('form_status.name as form_status_name');
    $query->leftJoin('form_status', 'form_status.id', 'form.form_status_id');
    $query->addSelect('group.name as group_name');
    $query->leftJoin('group', 'group.id', 'form.group_id');
    $query->addSelect('location.name as location_name');
    $query->leftJoin('location', 'location.id', 'form.location_id');
  }

  protected function buildQuery($query){
    $query->where('form.form_status_id', '<>', 2);
    $query->orderByDesc('form.id');
  }
}