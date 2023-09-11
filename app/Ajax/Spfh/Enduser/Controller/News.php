<?php
namespace App\Ajax\Spfh\Enduser\Controller;

use Illuminate\Http\Request;
use App\Core;
use App\Ajax;

class News extends Core\Controller
{
  public function all(Request $request){
    $all = new Ajax\Spfh\Enduser\Validator\News\All($request);
    if ($all->validate()) {
      return $all->apiSuccessResponse()->build();
    }
    return $all->apiErrorResponse()->build();
  }

  public function item(Request $request){
    $item = new Ajax\Spfh\Enduser\Validator\News\Item($request);
    if ($item->validate()) {
      return $item->apiSuccessResponse()->build();
    }
    return $item->apiErrorResponse()->build();
  }
}