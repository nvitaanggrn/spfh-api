<?php
namespace App\Ajax\Spfh\Admin\Validator\News;

use Exception;
use Wayang\Stdlib\Oid\Oid563;
use App\Db;
use App\Core;

class Create extends Core\Validator
{
  protected $_stopOnFailure = true;
  protected $_rules = [
    'title' => 'required|string|max:255',
    'category' => 'required|numeric',
    'image' => 'required|image|mimes:png,jpeg,jpg',
    'description' => 'required|string|max:510',
    'content' => 'required|string'
  ];

  public function resolve(){
    try {
      Db\Spfh\News::transaction(function(){
        $file = $this->getParam('image');
        $user = $this->getAuth()->getUser();
        $extension = $file->extension();
        $imageName = (string)Oid563::create() . ($extension ? '.' . $extension : '');
        $imagePath = Core\Filesystem::disk('image')->path('news');

        $news = new Db\Spfh\News();
        $news->news_status_id = 1;
        $news->category_id = $this->getDigitParam('category');
        $news->title = $this->getStringParam('title');
        $news->image = $imageName;
        $news->description = $this->getStringParam('description');
        $news->content = $this->getStringParam('content');
        $news->created_at = Core\Date::nowFromUtc();
        $news->created_by = $user->id;
        $news->save();
  
        $file->move($imagePath, $imageName);
      });
    } catch (Exception $e) {
      $this->logError($e);
      $this->getValidation()->addWildcardError('error');
      return false;
    }
    return true;
  }
}