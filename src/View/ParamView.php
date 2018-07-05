<?php

namespace Careship\View;


class ParamView extends View {
  /**
   * Returns the amount of notes as a json
   *
   * @param array $money
   */
  public function displayMoney(array $money) {
    $money_json = json_encode($money);
    echo $money_json;
  }
}