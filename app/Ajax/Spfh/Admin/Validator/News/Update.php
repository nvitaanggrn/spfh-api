<?php
namespace App\Ajax\Spfh\Admin\Validator\News;

use Exception;
use App\Db;
use App\Core;

class Update extends Item
{
  protected $_rules = [
    'id' => 'required|numeric',
    'title' => 'required|string|max:255',
    'category' => 'required|numeric',
    'image' => 'nullable|image|mimes:png,jpeg,jpg',
    'description' => 'required|string|max:510',
    'content' => 'required|string'
  ];

  public function resolve(){
    try {
      Db\Spfh\News::transaction(function(){
        $this->data->category_id = $this->getDigitParam('category');
        $this->data->title = $this->getStringParam('title');
        $this->data->description = $this->getStringParam('description');
        $this->data->content = $this->getStringParam('content');
        $this->data->save();
        $file = $this->getParam('image');
        if ($file) {
          $imageName = $this->data->image;
          $imagePath = Core\Filesystem::disk('image')->path('news');
          $file->move($imagePath, $imageName);
        }
      });
    } catch (Exception $e) {
      $this->logError($e);
      $this->getValidation()->addWildcardError('error');
      return false;
    }
    return true;
  }
}