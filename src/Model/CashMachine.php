<?php

namespace Careship\Model;

use Careship\Exception\NoteUnavailableException;

class CashMachine {
  
  /**
   * @var array|\Careship\Model\Note[]
   */
  private $notes = [];
  
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
   * @throws \InvalidArgumentException
   */
  public function withdrawCash($amount) {
    if ($amount < 0 or !ctype_digit($amount)) {
      throw new \InvalidArgumentException('Please enter a whole number higher than 0.' . PHP_EOL);
    }
    if (!$this->isAmountPossible($amount)) {
      throw new NoteUnavailableException('Amount must be divisible by 10');
    }
    if ($amount > $this->getBiggestPossibleAmount()) {
      throw new NoteUnavailableException(
        'Our money printing gnome wants to have a break from time to time.' . PHP_EOL
        . 'Please enter a smaller number than ' . $this->getBiggestPossibleAmount() . '.'
      );
    }
    return $this->calculateNotes($amount);
  }
  
  /**
   * Calculates the amount of each note
   *
   * @param $amount
   * @return mixed
   */
  protected function calculateNotes($amount) {
    $money = [];
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
  
  /**
   * Returns the maximum possible amount of money per request.
   * This is important because the calculation loop becomes inefficient
   * with very big integers
   *
   * @return int
   */
  protected function getBiggestPossibleAmount() {
    return 2000000000;
  }
}