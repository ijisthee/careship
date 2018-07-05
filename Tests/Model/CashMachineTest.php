<?php

namespace Careship\Tests\Model;

use Careship\Model\CashMachine;
use PHPUnit\Framework\TestCase;

class CashMachineTest extends TestCase {
  
  /**
   * @param $amount
   * @param $expected
   * @dataProvider withdrawCashProviderSuccess
   * @throws \Careship\Exception\NoteUnavailableException
   */
  public function testwithdrawCashSuccessful($amount, $expected) {
    $cachMachine = new CashMachine($this->initNotes());
    $result = $cachMachine->withdrawCash($amount);
    $this->assertEquals($result, $expected);
  }
  
  /**
   * Helper function to create the necessary array for CashMachine
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
  
  /**
   * @return array
   */
  public function withdrawCashProviderSuccess() {
    return [
      'test 10' =>
        [
          'amount' => 10,
          'expected' => [
            100 => 0,
            50 => 0,
            20 => 0,
            10 => 1,
          ],
        ],
      'test 20' =>
        [
          'amount' => 20,
          'expected' => [
            100 => 0,
            50 => 0,
            20 => 1,
            10 => 0,
          ],
        ],
      'test 30' =>
        [
          'amount' => 30,
          'expected' => [
            100 => 0,
            50 => 0,
            20 => 1,
            10 => 1,
          ],
        ],
      'test 40' =>
        [
          'amount' => 40,
          'expected' => [
            100 => 0,
            50 => 0,
            20 => 2,
            10 => 0,
          ],
        ],
      'test 50' =>
        [
          'amount' => 50,
          'expected' => [
            100 => 0,
            50 => 1,
            20 => 0,
            10 => 0,
          ],
        ],
      'test 60' =>
        [
          'amount' => 60,
          'expected' => [
            100 => 0,
            50 => 1,
            20 => 0,
            10 => 1,
          ],
        ],
      'test 70' =>
        [
          'amount' => 70,
          'expected' => [
            100 => 0,
            50 => 1,
            20 => 1,
            10 => 0,
          ],
        ],
      'test 80' =>
        [
          'amount' => 80,
          'expected' => [
            100 => 0,
            50 => 1,
            20 => 1,
            10 => 1,
          ],
        ],
      'test 90' =>
        [
          'amount' => 90,
          'expected' => [
            100 => 0,
            50 => 1,
            20 => 2,
            10 => 0,
          ],
        ],
      'test 100' =>
        [
          'amount' => 100,
          'expected' => [
            100 => 1,
            50 => 0,
            20 => 0,
            10 => 0,
          ],
        ],
      'test 200' =>
        [
          'amount' => 200,
          'expected' => [
            100 => 2,
            50 => 0,
            20 => 0,
            10 => 0,
          ],
        ],
    ];
  }
  
  /**
   * @param $amount
   * @param $expected
   * @dataProvider withdrawCashProviderFail
   * @throws \Careship\Exception\NoteUnavailableException
   */
  public function testwithdrawCashNotSuccessful($amount, $expected) {
    $cachMachine = new CashMachine($this->initNotes());
    $result = $cachMachine->withdrawCash($amount);
    $this->assertNotEquals($result, $expected);
  }
  
  public function withdrawCashProviderFail() {
    return [
      'test 10' =>
        [
          'amount' => 10,
          'expected' => [
            100 => 0,
            50 => 0,
            20 => 0,
            10 => 2,
          ],
        ],
      'test 20' =>
        [
          'amount' => 20,
          'expected' => [
            100 => 0,
            50 => 0,
            20 => 2,
            10 => 0,
          ],
        ],
      'test 30' =>
        [
          'amount' => 30,
          'expected' => [
            100 => 0,
            50 => 0,
            20 => 2,
            10 => 1,
          ],
        ],
      'test 40' =>
        [
          'amount' => 40,
          'expected' => [
            100 => 0,
            50 => 0,
            20 => 2,
            10 => 1,
          ],
        ],
      'test 50' =>
        [
          'amount' => 50,
          'expected' => [
            100 => 0,
            50 => 1,
            20 => 1,
            10 => 0,
          ],
        ],
      'test 60' =>
        [
          'amount' => 60,
          'expected' => [
            100 => 0,
            50 => 1,
            20 => 2,
            10 => 1,
          ],
        ],
      'test 70' =>
        [
          'amount' => 70,
          'expected' => [
            100 => 0,
            50 => 1,
            20 => 1,
            10 => 1,
          ],
        ],
      'test 80' =>
        [
          'amount' => 80,
          'expected' => [
            100 => 0,
            50 => 0,
            20 => 1,
            10 => 1,
          ],
        ],
      'test 90' =>
        [
          'amount' => 90,
          'expected' => [
            100 => 0,
            50 => 1,
            20 => 2,
            10 => 1,
          ],
        ],
      'test 100' =>
        [
          'amount' => 100,
          'expected' => [
            100 => 1,
            50 => 0,
            20 => 0,
            10 => 1,
          ],
        ],
      'test 200' =>
        [
          'amount' => 200,
          'expected' => [
            100 => 2,
            50 => 0,
            20 => 0,
            10 => 1,
          ],
        ],
    ];
  }
  
  /**
   * @param $amount
   * @throws \Careship\Exception\NoteUnavailableException
   * @expectedException \InvalidArgumentException
   * @dataProvider invalidArgumentExceptionProvider
   */
  public function testInvalidArgumentException($amount) {
    $cachMachine = new CashMachine($this->initNotes());
    $cachMachine->withdrawCash($amount);
  }
  
  public function invalidArgumentExceptionProvider() {
    return [
      ['f'],
      ['foo'],
      ['4f' . 4],
      [-44],
      [-5000],
      ['withdraw'],
    ];
  }
  
  /**
   * @expectedException \Careship\Exception\NoteUnavailableException
   * @dataProvider noteUnavailableExceptionProvider
   * @throws \ReflectionException
   */
  public function testNoteUnavailableException($amount) {
    $reflectedCalculateNotes = $this->getMethod('calculateNotes');
    $cachMachine = new CashMachine($this->initNotes());
    $reflectedCalculateNotes->invokeArgs($cachMachine, [$amount]);
  }
  
  /**
   * @param $name
   * @return \ReflectionMethod
   * @throws \ReflectionException
   */
  protected static function getMethod($name) {
    $class = new \ReflectionClass('\Careship\Model\CashMachine');
    $method = $class->getMethod($name);
    $method->setAccessible(TRUE);
    return $method;
  }
  
  public function noteUnavailableExceptionProvider() {
    return [
      [1],
      [11],
      [33],
      [125],
      [139],
      [5],
      [500000000000000],
    ];
  }
  
}