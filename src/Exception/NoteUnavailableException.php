<?php

namespace Careship\Exception;

class NoteUnavailableException extends \Exception {
  public function __construct($message, $code = 0) {
    parent::__construct($message, $code);
  }
}