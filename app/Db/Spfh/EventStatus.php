<?php
namespace App\Db\Spfh;

class EventStatus extends Model
{
  protected $table = 'event_status';

  protected $columns = [
    'id',
    'name'
  ];
}