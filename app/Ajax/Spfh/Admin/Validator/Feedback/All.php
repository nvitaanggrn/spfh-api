<?php
namespace App\Ajax\Spfh\Admin\Validator\Feedback;

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
    $query = Db\Spfh\Feedback::withColumns()->offset($p->getSkip())->limit($p->getTake());
    $this->buildJoin($query);
    $this->buildQuery($query);
    return $query->cursor();
  }

  protected function buildJoin($query){
    $query->addSelect('user.nip as user_nip');
    $query->addSelect('user.name as user_name');
    $query->leftJoin('user', 'user.id', 'feedback.user_id');
    $query->addSelect('feedback_status.name as feedback_status_name');
    $query->leftJoin('feedback_status', 'feedback_status.id', 'feedback.feedback_status_id');
  }

  protected function buildQuery($query){
    $pStartDatetime = $this->getStringParam('start_datetime');
    if ($pStartDatetime) {
      $query->where('feedback.datetime', '>=', $pStartDatetime);
    }
    $pEndDatetime = $this->getStringParam('end_datetime');
    if ($pEndDatetime) {
      $query->where('feedback.datetime', '<=', $pEndDatetime);
    }
    $query->where('feedback.feedback_status_id', 1);
    $query->orderByDesc('feedback.id');
  }
}