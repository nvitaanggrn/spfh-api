<?php
namespace App\Ajax\Spfh\Admin\Validator\Event;

use Exception;
use App\Db;
use App\Core;

class Create extends Core\Validator
{
  protected $_stopOnFailure = true;
  protected $_rules = [
    'link' => 'required|url',
    'title' => 'required|string|max:255',
    'description' => 'required|string|max:510',
    'schedule_datetime' => 'required|date_format:Y-m-d H:i:s',
    'expired_datetime' => 'required|date_format:Y-m-d H:i:s'
  ];

  public function resolve(){
    try {
      Db\Spfh\Event::transaction(function(){
        $event = new Db\Spfh\Event();
        $event->event_status_id = 1;
        $event->link = $this->getStringParam('link');
        $event->title = $this->getStringParam('title');
        $event->description = $this->getStringParam('description');
        $event->schedule_at = $this->getStringParam('schedule_datetime');
        $event->expired_at = $this->getStringParam('expired_datetime');
        $event->save();
      });
    } catch (Exception $e) {
      $this->logError($e);
      $this->getValidation()->addWildcardError('error');
      return false;
    }
    return true;
  }
}