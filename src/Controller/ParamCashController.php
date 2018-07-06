<?php

namespace Careship\Controller;

class ParamCashController extends CashController {
  
  /**
   * Returns welcome message to user
   */
  public function sendWelcome() {
    $welcome_message =
      '--------------------------------<br>'
      . 'Welcome to Cash Machine 3000.<br>'
      . '--------------------------------<br>'
      . 'Your amount of money is infinite because you are awesome!<br>'
      . 'Available Notes are $100, $50, $20, $10.<br>'
      . '--------------------------------<br>'
      . '--------Available commands------<br>'
      . '--------------------------------<br>'
      . '"?withdraw=xxx" - withdraws xxx amount of money<br>';
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