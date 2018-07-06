<?php

namespace Careship\View;

/**
 * Class View
 * @package Careship\View
 */
abstract class View implements IView {
  
  /**
   * Displays common messages
   *
   * @param $message
   */
  public function display($message) {
    echo $message . PHP_EOL;
  }
  
  /**
   * Displays the amount of notes
   *
   * @param array $money
   */
  public function displayMoney(array $money) {
    print_r($money);
  }
  
  /**
   * Displays error messages
   *
   * @param $message
   */
  public function displayError($message) {
    echo $message . PHP_EOL;
  }
  
  
}