<?php

namespace Careship\View;


interface IView {
  public function display($message);
  
  public function displayMoney(array $money);
  
  public function displayError($message);
}