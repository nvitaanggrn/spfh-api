<?php
namespace App\Db\Spfh;

class FormProcess extends Model
{
  protected $table = 'form_process';

  protected $columns = [
    'form_id',
    'form_status_id',
    'datetime',
    'description'
  ];

  protected $columnKeys = [
    'form_id',
    'form_status_id'
  ];
}