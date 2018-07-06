<?php

namespace Careship\Controller;

use Careship\Exception\NoteUnavailableException;
use Careship\Model\CashMachine;
use Careship\View\IView;

/**
 * Class CashController
 * @package Careship\Controller
 */
abstract class CashController {
  
  /**
   * @var CashMachine $cashMachine
   */
  protected $cashMachine;
  
  /**
   * @var IView $view
   */
  protected $view;
  
  /**
   * CashController constructor.
   *
   * @param IView $view
   */
  public function __construct(IView $view) {
    $this->view = $view;
  }
  
  /**
   * @return \Careship\View\IView
   */
  public function getView() {
    return $this->view;
  }
  
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
      . '"withdraw xx" - withdraws xx amount of money' . PHP_EOL
      . '"exit" - exits the program' . PHP_EOL;
    
    $this->view->display($welcome_message);
  }
  
  /**
   * Controls the withdraw process and sends the money to withdraw to the view
   *
   * @param int $amount
   * @return string
   */
  public function withdraw($amount) {
    try {
      $money = $this->getCashMachine()->withdrawCash($amount);
      return $this->view->displayMoney($money);
    } catch (NoteUnavailableException $e) {
      $this->view->displayError($e->getMessage());
    } catch (\Exception $e) {
      $this->view->displayError($e->getMessage());
    }
  }
  
  /**
   * @return CashMachine
   */
  protected function getCashMachine() {
    if ($this->cashMachine instanceof CashMachine) {
      return $this->cashMachine;
    }
    $notes = $this->initNotes();
    $this->cashMachine = new CashMachine($notes);
    return $this->cashMachine;
  }
  
  /**
   * Creates available notes
   *
   * @return array
   */
  protected function initNotes() {
    return [
      100 => 100,
      50 => 50,
      20 => 20,
      10 => 10,
    ];
  }
}