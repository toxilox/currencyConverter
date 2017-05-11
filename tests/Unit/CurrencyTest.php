<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use \App\Currency;

class CurrencyTest extends TestCase
{
/**
 * Get and set iso4217 test
 * @return void
 */
    public function testCanSetGetIso4217(){
      $currency = new Currency;
      $currency->setIso4217('SEK');
      $this->assertTrue($currency->getIso4217() === 'SEK');
    }

/**
 * Get and set name test
 * @return void
 */
    public function testCanSetGetName(){
      $currency = new Currency;
      $currency->setName('Swedish Krona');
      $this->assertTrue($currency->getName() === 'Swedish Krona');
    }

/**
 * Get and set rate test
 * @return void
 */
    public function testCanSetGetRate(){
      $currency = new Currency;
      $currency->setRate(42.0);
      $this->assertTrue($currency->getRate() === 42.0);
    }

/**
 * Set all properties Tests
 * @return void
 */
    public function testSetProperties(){
      $currency = new Currency;
      $currency->setProperties('SEK', 'Swedish Krona', 42.0);
      $this->assertTrue(
        $currency->getIso4217() === 'SEK' &&
        $currency->getName() === 'Swedish Krona' &&
        $currency->getRate() === 42.0);
    }
}
