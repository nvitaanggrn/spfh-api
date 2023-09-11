<?php
namespace App\Db\Spfh;

class Form extends Model
{
  protected $table = 'form';

  protected $columns = [
    'id',
    'form_status_id',
    'user_id',
    'created_at',
    'reported_at',
    'group_id',
    'location_id',
    'place',
    'situation',
    'possibility',
    'repairaction',
    'repairsuggest'
  ];
}