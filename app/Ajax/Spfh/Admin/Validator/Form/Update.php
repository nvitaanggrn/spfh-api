<?php
namespace App\Ajax\Spfh\Admin\Validator\Form;

use Exception;
use App\Db;

class Update extends Item
{
  protected $_stopOnFailure = true;
  protected $_rules = [
    'id' => 'required|numeric',
    'status' => 'required|in:1,3,4,5,6',
    'datetime' => 'required|date_format:Y-m-d H:i:s',
    'description' => 'nullable|string|max:510'
  ];

  public function resolve(){
    try {
      Db\Spfh\Form::transaction(function(){
        $pStatus = $this->getDigitParam('status');
        $this->deleteFormProcess();
        $this->createFormProcess();
        $this->data->form_status_id = $pStatus;
        $this->data->save();
        $this->data = $this->fetchData();
      });
    } catch (Exception $e) {
      $this->logError($e);
      $this->getValidation()->addWildcardError('error');
      return false;
    }
    return true;
  }

  protected function deleteFormProcess(){
    $pStatus = $this->getDigitParam('status');
    Db\Spfh\FormProcess::where(['form_process.form_id' => $this->data->id, 'form_process.form_status_id' => $pStatus])
      ->delete();
  }

  protected function createFormProcess(){
    $pStatus = $this->getDigitParam('status');
    $pDatetime = $this->getStringParam('datetime');
    $pDescription = $this->getStringParam('description');
    $formProcess = new Db\Spfh\FormProcess();
    $formProcess->form_id = $this->data->id;
    $formProcess->form_status_id = $pStatus;
    $formProcess->datetime = $pDatetime;
    $formProcess->description = $pDescription;
    $formProcess->save();
  }
}