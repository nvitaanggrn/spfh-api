<?php
namespace App\Core\Spfh;

use mikehaertl\shellcommand;

class Command extends shellcommand\Command
{
  public function addArgs(array $args){
    foreach ($args as $key => $value) {
      if (is_int($key)) {
        $this->addArg('--'.$value);
      } else {
        $this->addArg('--'.$key, $value);
      }
    }
  }
}