<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Currency;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class CurrenciesController extends Controller
{
    // Return the currency index view with currency data
    public function index()
    {
      $currencies = Currency::all();

      return view('currencies.index', compact('currencies'));
    }

    // Truncate the currency table
    public function truncate()
    {
      Currency::truncate();
    }

    // Request currency data from openexchangerates api and put it in the database
    public function updateCurrencies(Request $request)
    {
      $client = new \GuzzleHttp\Client(['base_uri' => 'https://openexchangerates.org/api/']);

      try {
        $responseNames = $client->request('GET', 'currencies.json')->getBody();
      } catch (RequestException $e) {
        Log::error(Psr7\str($e->getRequest()));
        if ($e->hasResponse()) {
          Log::error(Psr7\str($e->getResponse()));
        }
      }

      try {
        $responseRates = $client->request('GET', 'latest.json?app_id=fb2b4ec98d4c4b2fa004e15733069be8')->getBody();
      } catch (RequestException $e) {
        Log::error(Psr7\str($e->getRequest()));
        if ($e->hasResponse()) {
          Log::error(Psr7\str($e->getResponse()));
        }
      }
      $jsonNames = json_decode($responseNames);
      $jsonRates = json_decode($responseRates);

      foreach ($jsonRates->rates as $key => $value) {
        $currency = Currency::where('iso_4217', $key)->first();
        if (!$currency) {
          $currency = new Currency;
          $currency->iso_4217 = $key;
          $currency->name = 'Not available';
        }
        $currency->rate = $value;
        $currency->save();
      }

      foreach ($jsonNames as $key => $value) {
        $currency = Currency::where('iso_4217', $key)->first();
        $currency->name = $value;
        $currency->save();
      }

      $currencies = Currency::all();
      return response($currencies);
    }
}
