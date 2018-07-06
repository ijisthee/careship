<?php

namespace Careship\View;

/**
 * Interface IView
 * @package Careship\View
 */
interface IView {
  
  /**
   * Displays common messages
   *
   * @param $message
   */
  public function display($message);
  
  /**
   * Displays the amount of notes
   *
   * @param array $money
   */
  public function displayMoney(array $money);
  
  /**
   * Displays error messages
   *
   * @param $message
   */
  public function displayError($message);
}