<?php
namespace App\Ajax\Spfh\Admin\Controller;

use Illuminate\Http\Request;
use App\Core;
use App\Ajax;

class Users extends Core\Controller
{
  public function all(Request $request){
    $all = new Ajax\Spfh\Admin\Validator\Users\All($request);
    if ($all->validate()) {
      return $all->apiSuccessResponse()->build();
    }
    return $all->apiErrorResponse()->build();
  }

  public function item(Request $request){
    $item = new Ajax\Spfh\Admin\Validator\Users\Item($request);
    if ($item->validate()) {
      return $item->apiSuccessResponse()->build();
    }
    return $item->apiErrorResponse()->build();
  }

  public function create(Request $request){
    $create = new Ajax\Spfh\Admin\Validator\Users\Create($request);
    if ($create->validate() && $create->resolve()) {
      return $create->apiSuccessResponse()->build();
    }
    return $create->apiErrorResponse()->build();
  }

  public function update(Request $request){
    $update = new Ajax\Spfh\Admin\Validator\Users\Update($request);
    if ($update->validate() && $update->resolve()) {
      return $update->apiSuccessResponse()->build();
    }
    return $update->apiErrorResponse()->build();
  }

  public function delete(Request $request){
    $delete = new Ajax\Spfh\Admin\Validator\Users\Delete($request);
    if ($delete->validate() && $delete->resolve()) {
      return $delete->apiSuccessResponse()->build();
    }
    return $delete->apiErrorResponse()->build();
  }
}