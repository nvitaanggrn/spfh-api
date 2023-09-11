<?php
namespace App\Db\Spfh;

use App\Core;

class Event extends Model
{
  protected $table = 'event';

  protected $columns = [
    'id',
    'event_status_id',
    'link',
    'title',
    'description',
    'schedule_at',
    'expired_at'
  ];

  protected $appends = [
    'schedule_date',
    'expired_date'
  ];

  protected function getScheduleDateAttribute(){
    $dateTime = Core\Date::parseFromUtc($this->schedule_at)->tz('Asia/Jakarta');
    return [
      'year' => $dateTime->format('Y'),
      'month' => $dateTime->translatedFormat('M'),
      'day' => $dateTime->format('d'),
      'time' => $dateTime->format('H:i')
    ];
  }

  protected function getExpiredDateAttribute(){
    $dateTime = Core\Date::parseFromUtc($this->expired_at)->tz('Asia/Jakarta');
    return [
      'year' => $dateTime->format('Y'),
      'month' => $dateTime->translatedFormat('M'),
      'day' => $dateTime->format('d'),
      'time' => $dateTime->format('H:i')
    ];
  }
}