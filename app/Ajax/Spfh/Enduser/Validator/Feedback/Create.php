<?php
namespace App\Ajax\Spfh\Enduser\Validator\Feedback;

use Exception;
use App\Db;
use App\Core;

class Create extends Core\Validator
{
  protected $_stopOnFailure = true;
  protected $_rules = [
    'title' => 'required|string|max:255',
    'description' => 'required|string|max:1024'
  ];

  protected $user;

  protected function beforeValidate(){
    $this->user = $this->getAuth()->getUser();
    return true;
  }

  public function resolve(){
    try {
      Db\Spfh\Feedback::transaction(function(){
        $feedback = new Db\Spfh\Feedback();
        $feedback->feedback_status_id = 1;
        $feedback->user_id = $this->user->id;
        $feedback->title = $this->getStringParam('title');
        $feedback->datetime = Core\Date::nowFromUtc();
        $feedback->description = $this->getStringParam('description');
        $feedback->save();
      });
    } catch (Exception $e) {
      $this->logError($e);
      $this->getValidation()->addWildcardError('error');
      return false;
    }
    return true;
  }
}