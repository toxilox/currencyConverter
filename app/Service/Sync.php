<?php

namespace App\Service;

use \App\Currency;

class Sync {
  private $currencies;

  public function __construct(){
    $this->currencies = Currency::all();
  }

/**
 * Get a collection of all currencies in the database
 * @return collection        Correction with currency objects
 */
  public function getCurrencies(){
    $this->currencies = Currency::all();
    return $this->currencies;
  }

/**
 * Get the Currency object with $iso4217
 * @param  string $iso4217
 * @return Currency          Currency object
 */
  public function getByIso4217(string $iso4217){

    return Currency::where('iso_4217', $iso4217)->first();
  }

}
