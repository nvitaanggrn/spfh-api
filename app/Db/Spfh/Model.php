<?php
namespace App\Db\Spfh;

use App\Db;

abstract class Model extends Db\Model\Model
{
  protected $connection = 'spfh';
  protected $createdColumns = [];
  protected $updatedColumns = [];

  public function __construct(array $attributes = []){
    parent::__construct($attributes);
    $this->databaseIdentitier = $this->getConnection()->getDatabaseName();
    $this->tableIdentitier = $this->getTable();
  }
}