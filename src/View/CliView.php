<?php

namespace Careship\View;

/**
 * Class CliView
 * @package Careship\View
 *
 */
class CliView extends View {
  
  /**
   * Displays the amount of notes for CLIs
   *
   * @param array $money
   */
  public function displayMoney(array $money) {
    ksort($money);
    $total = 0;
    foreach ($money as $note => $amount) {
      $total += $note * $amount;
      if ($amount > 0) {
        echo 'You get ' . $amount . ' x $' . $note . PHP_EOL;
      }
    }
    echo '-------------------' . PHP_EOL;
    echo 'You get totally paid $' . $total . PHP_EOL;
  }
}