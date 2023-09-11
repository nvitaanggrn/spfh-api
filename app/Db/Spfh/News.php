<?php
namespace App\Db\Spfh;

use App\Core;

class News extends Model
{
  protected $table = 'news';

  protected $columns = [
    'id',
    'news_status_id',
    'category_id',
    'title',
    'image',
    'description',
    'content',
    'created_at',
    'created_by'
  ];

  protected $appends = [
    'image_url',
    'image_type'
  ];

  protected function getImageUrlAttribute(){
    $image = Core\Filesystem::disk('image')->url('news/'.$this->image);
    $image.= '?'.http_build_query(['_t' => time()]);
    return $image;
  }

  protected function getImageTypeAttribute(){
    $mimeType = Core\Filesystem::disk('image')->mimeType('news/'.$this->image);
    return $mimeType;
  }
}