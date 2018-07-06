<?php

namespace Careship\Exception;

/**
 * This class is responsible for handling exceptions with unavailable notes
 *
 * Class NoteUnavailableException
 * @package Careship\Exception
 */
class NoteUnavailableException extends \Exception {
  
  /**
   * NoteUnavailableException constructor.
   * @param $message
   * @param int $code
   */
  public function __construct($message, $code = 0) {
    parent::__construct($message, $code);
  }
}