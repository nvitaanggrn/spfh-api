<?php
namespace App\Db\Spfh;

class Feedback extends Model
{
  protected $table = 'feedback';

  protected $columns = [
    'id',
    'feedback_status_id',
    'user_id',
    'title',
    'datetime',
    'description'
  ];
}