<?php
namespace App\Ajax\Spfh\Admin\Controller;

use Illuminate\Http\Request;
use App\Core;

class Index extends Core\Controller
{
  public function who(Request $request){
    return $this->jsonResponse(config('app.name'))->build();
  }

  public function ping(Request $request){
    return $this->jsonResponse('pong')->build();
  }
}