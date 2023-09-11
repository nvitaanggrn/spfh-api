<?php
namespace App\Db\Spfh;

class FormTag extends Model
{
  protected $table = 'form_tag';

  protected $columns = [
    'form_id',
    'tag'
  ];

  protected $columnKeys = [
    'form_id'
  ];
}