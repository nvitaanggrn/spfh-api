<?php
namespace App\Ajax\Spfh\Admin\Validator\Users;

use App\Db;
use App\Core;

class All extends Core\Validator
{
  protected $_stopOnFailure = true;
  protected $_rules = [
    'type' => 'nullable|numeric',
    'nip' => 'nullable|numeric',
    'name' => 'nullable|string|max:255',
    'group' => 'nullable|numeric'
  ];

  public function apiSuccessResponse(){
    $data = $this->fetchData();
    return parent::apiSuccessResponse()->data($data);
  }

  protected function fetchData(){
    $p = $this->getPagination();
    $query = Db\Spfh\User::withColumns()->offset($p->getSkip())->limit($p->getTake());
    $this->buildJoin($query);
    $this->buildQuery($query);
    return $query->cursor();
  }

  protected function buildJoin($query){
    $query->addSelect('user_type.name as user_type_name');
    $query->leftJoin('user_type', 'user_type.id', 'user.user_type_id');
    $query->addSelect('user_status.name as user_status_name');
    $query->leftJoin('user_status', 'user_status.id', 'user.user_status_id');
  }

  protected function buildQuery($query){
    $pType = $this->getDigitParam('type');
    if ($pType) {
      $query->where('user.user_type_id', $pType);
    }
    $pNip = $this->getDigitParam('nip');
    if ($pNip) {
      $query->where('user.nip', $pNip);
    }
    $pName = $this->getStringParam('name');
    if ($pName) {
      $pName = '%'.$query->getModel()->escapeMatchValue($pName).'%';
      $query->where('user.name', 'ILIKE', $pName);
    }
    $pGroup = $this->getDigitParam('group');
    if ($pGroup) {
      $query->where('user.group_id', $pGroup);
    }
    $user = $this->getAuth()->getUser();
    $query->where('user.id', '<>', $user->id);
    $query->where('user.user_status_id', 1);
    $query->orderByDesc('user.id');
  }
}