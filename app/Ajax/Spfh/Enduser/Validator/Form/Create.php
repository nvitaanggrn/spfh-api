<?php
namespace App\Ajax\Spfh\Enduser\Validator\Form;

use Exception;
use App\Db;
use App\Core;

class Create extends Core\Validator
{
  protected $_stopOnFailure = true;
  protected $_rules = [
    'datetime' => 'required|date_format:Y-m-d H:i:s',
    'location' => 'required|numeric',
    'place' => 'required|string|max:255',
    'situation' => 'required|string|max:255',
    'possibility' => 'required|string|max:255',
    'repairaction' => 'required|string|max:510',
    'repairsuggest' => 'required|string|max:510'
  ];

  protected $user;
  protected $location;
  protected $tags;

  protected function beforeValidate(){
    $this->user = $this->getAuth()->getUser();
    return true;
  }

  protected function afterValidate(){
    return $this->validateLocation() && $this->validateDuplicate();
  }

  protected function validateLocation(){
    $pLocation = $this->getDigitParam('location');
    $mLocation = Db\Spfh\Location::withColumns()
      ->where('location.id', $pLocation)
      ->first();
    if (!$mLocation) {
      $this->getValidation()->addError('location', 'exists');
      return false;
    }
    $this->location = $mLocation;
    return true;
  }

  protected function validateDuplicate(){
    $startDate = Core\Date::parseFromUtc($this->getStringParam('datetime'))->startOfDay();
    $endDate = $startDate->copy()->endOfDay();
    $tags = preg_split('/[^a-zA-Z0-9]+/', $this->getStringParam('place'));
    $tags = array_unique(array_map('strtolower', $tags));
    $isExists = Db\Spfh\FormTag::selectRaw(1)
      ->leftJoin('form', 'form.id', 'form_tag.form_id')
      ->where('form.form_status_id', '<>', 2)
      ->where('form.location_id', $this->location->id)
      ->where('form.reported_at' , '>=', $startDate)
      ->where('form.reported_at' , '<=', $endDate)
      ->whereIn('form_tag.tag', $tags)
      ->exists();
    if ($isExists) {
      $this->getValidation()->addWildcardError('form');
      return false;
    }
    $this->tags = $tags;
    return true;
  }

  public function resolve(){
    try {
      Db\Spfh\Form::transaction(function(){
        $form = new Db\Spfh\Form();
        $form->form_status_id = 1;
        $form->user_id = $this->user->id;
        $form->created_at = Core\Date::nowFromUtc();
        $form->reported_at = $this->getStringParam('datetime');
        $form->group_id = $this->user->group_id;
        $form->location_id = $this->location->id;
        $form->place = $this->getStringParam('place');
        $form->situation = $this->getStringParam('situation');
        $form->possibility = $this->getStringParam('possibility');
        $form->repairaction = $this->getStringParam('repairaction');
        $form->repairsuggest = $this->getStringParam('repairsuggest');
        $form->save();
        $tags = array_map(fn($tag) => ['form_id' => $form->id, 'tag' => $tag], $this->tags);
        Db\Spfh\FormTag::insert($tags);
      });
    } catch (Exception $e) {
      $this->logError($e);
      $this->getValidation()->addWildcardError('error');
      return false;
    }
    return true;
  }
}