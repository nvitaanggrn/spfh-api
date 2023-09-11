<?php
namespace App\Ajax\Spfh\Admin\Controller;

use Illuminate\Http\Request;
use App\Core;
use App\Ajax;

class Form extends Core\Controller
{
  public function all(Request $request){
    $all = new Ajax\Spfh\Admin\Validator\Form\All($request);
    if ($all->validate()) {
      return $all->apiSuccessResponse()->build();
    }
    return $all->apiErrorResponse()->build();
  }

  public function item(Request $request){
    $item = new Ajax\Spfh\Admin\Validator\Form\Item($request);
    if ($item->validate()) {
      return $item->apiSuccessResponse()->build();
    }
    return $item->apiErrorResponse()->build();
  }

  public function update(Request $request){
    $update = new Ajax\Spfh\Admin\Validator\Form\Update($request);
    if ($update->validate() && $update->resolve()) {
      return $update->apiSuccessResponse()->build();
    }
    return $update->apiErrorResponse()->build();
  }

  public function datapdf(Request $request){
    $datapdf = new Ajax\Spfh\Admin\Validator\Form\Datapdf($request);
    if ($datapdf->validate() && $datapdf->resolve()) {
      return $datapdf->response();
    }
    return $datapdf->apiErrorResponse()->build();
  }

  public function viewpdf(Request $request){
    $viewpdf = new Ajax\Spfh\Admin\Validator\Form\Viewpdf($request);
    if ($viewpdf->validate() && $viewpdf->resolve()) {
      return $viewpdf->response();
    }
    return $viewpdf->apiErrorResponse()->build();
  }
}