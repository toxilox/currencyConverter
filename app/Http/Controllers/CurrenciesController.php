<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use \App\Currency;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use \App\Service\ApiHandler;
use \App\Service\Sync;

class CurrenciesController extends Controller
{
    private $sync;
    private $api;

    public function __construct(){
      $this->sync = new Sync;
      $this->api = new ApiHandler;
    }


    /**
     * return the currency index view with currency data
     */
    public function index()
    {
      $currencies = $this->sync->getCurrencies();
      return view('currencies.index', compact('currencies'));
    }

    /**
     * loops through $currencies and invokes deleteSelf() on every object
     * @return void
     */
    public function truncate()
    {
      foreach ($this->sync->getCurrencies() as $currency) {
        $currency->deleteSelf();
      }
      $currencies = $this->sync->getCurrencies();
      // return view('currencies.index', compact('currencies'));
    }

    /**
     * Request currency data from api and create new or update old currencies
     * @return object           json
     */
    public function updateCurrencies()
    {
      $jsonNames = $this->api->getCurrencyData('GET', 'names');
      $jsonRates = $this->api->getCurrencyData('GET', 'rates');

      foreach ($jsonRates->rates as $key => $value) {
        $currency = $this->sync->getByIso4217($key);
        if (!$currency) {
          $currency = new Currency;
          $currency->setIso4217($key);
        }
        $currency->setRate($value);
        $currency->save();
      }

      foreach ($jsonNames as $key => $value) {
        $currency = $this->sync->getByIso4217($key);
        $currency->setName($value);
        $currency->save();
      }

      $currencies = $this->sync->getCurrencies();
      // return view('currencies.index', compact('currencies'));
      return response($currencies);
    }
}

// bryt controllern så det går att testa
// phpdoc
// doc felhantering
// classs diagram
// återanvända template för tabell
// prophecy mock
