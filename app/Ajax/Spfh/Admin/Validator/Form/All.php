<?php
namespace App\Ajax\Spfh\Admin\Validator\Form;

use App\Db;
use App\Core;

class All extends Core\Validator
{
  protected $_stopOnFailure = true;
  protected $_rules = [
    'nip' => 'nullable|numeric',
    'status' => 'nullable|numeric',
    'group' => 'nullable|numeric',
    'location' => 'nullable|numeric',
    'start_datetime' => 'nullable|date_format:Y-m-d H:i:s',
    'end_datetime' => 'nullable|date_format:Y-m-d H:i:s'
  ];

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
    $pNip = $this->getDigitParam('nip');
    if ($pNip) {
      $query->where('user.nip', $pNip);
    }
    $pStatus = $this->getDigitParam('status');
    if ($pStatus) {
      $query->where('form.form_status_id', $pStatus);
    }
    $pGroup = $this->getDigitParam('group');
    if ($pGroup) {
      $query->where('form.group_id', $pGroup);
    }
    $pLocation = $this->getDigitParam('location');
    if ($pLocation) {
      $query->where('form.location_id', $pLocation);
    }
    $pStartDatetime = $this->getStringParam('start_datetime');
    if ($pStartDatetime) {
      $query->where('form.reported_at', '>=', $pStartDatetime);
    }
    $pEndDatetime = $this->getStringParam('end_datetime');
    if ($pEndDatetime) {
      $query->where('form.reported_at', '<=', $pEndDatetime);
    }
    $query->where('form.form_status_id', '<>', 2);
    $query->orderByDesc('form.id');
  }
}