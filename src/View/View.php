<?php

namespace Careship\View;


abstract class View implements IView {
  
  /**
   * Displays the amount of notes
   *
   * @param array $money
   */
  public function displayMoney(array $money) {
    print_r($money);
  }
  
  public function displayError($message) {
    echo $message . PHP_EOL;
  }
  
  public function display($message) {
    echo $message . PHP_EOL;
  }
}