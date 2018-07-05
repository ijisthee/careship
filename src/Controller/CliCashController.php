<?php

namespace Careship\Controller;


class CliCashController extends CashController {
  
  /**
   * Starts an infinite while loop to receive user input from CLI
   */
  public function runEngine() {
    while (TRUE) {
      $line = $this->readCommand();
      if ($line == 'exit') {
        echo PHP_EOL;
        break;
      }
      else {
        $input = preg_split("/[\s,]+/", $line);
        $this->runCommand($input);
      }
    }
  }
  
  /**
   * Reads the user input from CLI
   *
   * @return string
   */
  protected function readCommand() {
    $line = readline("> ");
    readline_add_history($line);
    return $line;
  }
  
  /**
   * Decides which command to run based on CLI user input
   *
   * @param array $input
   */
  protected function runCommand(array $input) {
    if (!empty($input[0])) {
      switch ($input[0]) {
        case 'withdraw':
          if (isset($input[1])) {
            $this->withdraw($input[1]);
          }
          break;
        default:
          echo 'Wrong command' . PHP_EOL;
      }
    }
  }
}