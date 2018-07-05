<?php

namespace Careship\Model;

use Careship\Exception\NoteUnavailableException;

class CashMachine {
  
  private $notes = array();
  
  /**
   * CashMachine constructor.
   * @param Note[] $notes
   */
  public function __construct(array $notes) {
    $this->notes = $notes;
  }
  
  /**
   * @param $amount
   * @return mixed
   * @throws \Careship\Exception\NoteUnavailableException
   */
  public function withdrawCash($amount) {
    if (!is_numeric($amount)) {
      throw new \InvalidArgumentException('Please enter a number.' . PHP_EOL);
    }
    if ($amount < 0) {
      throw new \InvalidArgumentException('Please enter a number higher than 0.' . PHP_EOL);
    }
    try {
      return $this->calculateNotes($amount);
    } catch (NoteUnavailableException $e) {
      throw $e;
    }
  }
  
  /**
   * Calculates the amount of each note
   *
   * @param $amount
   * @return mixed
   * @throws \Careship\Exception\NoteUnavailableException
   */
  protected function calculateNotes($amount) {
    if (!$this->isAmountPossible($amount)) {
      throw new NoteUnavailableException('Amount must be divisible by 10');
    }
    $biggestAmount = 2000000000;
    if ($amount > $biggestAmount) {
      throw new NoteUnavailableException(
        'Try a number smaller than ' . $biggestAmount . '.' . PHP_EOL
      );
    }
    $money = array();
    foreach ($this->notes as $note) {
      $money[$note] = 0;
      while ($amount - $note >= 0) {
        $amount -= $note;
        $money[$note]++;
      }
    }
    return $money;
  }
  
  /**
   * Checks if amount is divisible by 10
   *
   * @param int $amount
   * @return bool
   */
  protected function isAmountPossible($amount) {
    return $amount % 10 == 0;
  }
}