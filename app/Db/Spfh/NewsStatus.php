<?php
namespace App\Db\Spfh;

class NewsStatus extends Model
{
  protected $table = 'news_status';

  protected $columns = [
    'id',
    'name'
  ];
}