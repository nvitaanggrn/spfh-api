<?php
namespace App\Ajax\Spfh\Admin\Validator\Form;

use Exception;
use App\Core;

class Viewpdf extends Item
{
  public function getData(){
    return $this->data;
  }

  public function formatDateTime($value){
    return Core\Date::parseFromUtc((string)$value)->tz('Asia/Jakarta')->locale('id')->translatedFormat('d M Y H:i');
  }

  public function resolve(){
    try {
      $outfile = 'laporan-hiyarihatto-item.pdf';
      $this->response = Core\Spfh\Wkhtmltopdf::loadView('form.pdf.item', ['__this' => $this], ['outfile' => $outfile])->binaryStream();
    } catch (Exception $e) {
      $this->logError($e);
      $this->getValidation()->addWildcardError('error');
      return false;
    }
    return true;
  }

  public function response(){
    return $this->response;
  }
}