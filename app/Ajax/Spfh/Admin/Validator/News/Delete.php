<?php
namespace App\Ajax\Spfh\Admin\Validator\News;

use Exception;
use App\Db;

class Delete extends Item
{
  public function resolve(){
    try {
      Db\Spfh\News::transaction(function(){
        $this->data->news_status_id = 2;
        $this->data->save();
      });
    } catch (Exception $e) {
      $this->logError($e);
      $this->getValidation()->addWildcardError('error');
      return false;
    }
    return true;
  }
}