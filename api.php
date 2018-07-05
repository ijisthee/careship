<?php

namespace Careship;
require_once 'vendor/autoload.php';

use Careship\Controller\CliCashController;
use Careship\Controller\ParamCashController;
use Careship\View\CliView;
use Careship\View\ParamView;

if (!empty($argv)) {
  $view = new CliView();
  $controller = new CliCashController($view);
  $controller->sendWelcome();
  $controller->runEngine();
}
else {
  $view = new ParamView();
  $controller = new ParamCashController($view);
  $amount = $controller->getParameter('withdraw');
  if (isset($amount)) {
    $controller->withdraw($amount);
  }
  else {
    $controller->sendWelcome();
  }
}
