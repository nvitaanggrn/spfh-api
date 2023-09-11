<?php
namespace App\Db\Spfh;

class FeedbackStatus extends Model
{
  protected $table = 'feedback_status';

  protected $columns = [
    'id',
    'name'
  ];
}