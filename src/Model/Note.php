<?php

namespace Careship\Model;

/**
 * Class Note
 * @package Careship\Model
 */
class Note {
  private $value = 0;
  
  public function __construct($value) {
    $this->value = (int) $value;
  }
  
  public function getValue() {
    return $this->value;
  }
}