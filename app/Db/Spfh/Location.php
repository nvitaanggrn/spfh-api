<?php
namespace App\Db\Spfh;

class Location extends Model
{
  protected $table = 'location';

  protected $columns = [
    'id',
    'name'
  ];
}