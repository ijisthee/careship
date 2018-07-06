<?php

namespace Careship\View;

/**
 * Class ParamView
 * @package Careship\View
 */
class ParamView extends View {
  /**
   * Prints the amount of notes as a json
   *
   * @param array $money
   */
  public function displayMoney(array $money) {
    $money_json = json_encode($money);
    echo $money_json;
  }
}