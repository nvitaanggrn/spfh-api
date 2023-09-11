<?php
namespace App\Ajax\Spfh\Admin\Validator\Stats;

use App\Db;
use App\Core;

class All extends Core\Validator
{
  public function apiSuccessResponse(){
    $data['form'] = Db\Spfh\Form::where('form.form_status_id', '<>', 2)->count('id');
    $data['event'] = Db\Spfh\Event::where('event.event_status_id', 1)->count('id');
    $data['news'] = Db\Spfh\News::where('news.news_status_id', 1)->count('id');
    $data['feedback'] = Db\Spfh\Feedback::where('feedback.feedback_status_id', 1)->count('id');
    return parent::apiSuccessResponse()->data($data);
  }
}