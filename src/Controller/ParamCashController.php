<?php

namespace Careship\Controller;

class ParamCashController extends CashController {
  
  /**
   * Returns welcome message to user
   */
  public function sendWelcome() {
    $welcome_message =
      '--------------------------------' . PHP_EOL
      . 'Welcome to Cash Machine 3000.' . PHP_EOL
      . '--------------------------------' . PHP_EOL
      . 'Your amount of money is infinite because you are awesome!' . PHP_EOL
      . 'Available Notes are $100, $50, $20, $10.' . PHP_EOL
      . '--------------------------------' . PHP_EOL
      . '--------Available commands------' . PHP_EOL
      . '--------------------------------' . PHP_EOL
      . '"?withdraw=xxx" - withdraws xxx amount of money' . PHP_EOL;
    $this->view->display($welcome_message);
  }
  
  /**
   * @param string $param
   * @return null
   */
  public function getParameter($param = '') {
    if (isset($_GET[$param])) {
      return $_GET[$param];
    }
    return NULL;
  }
}