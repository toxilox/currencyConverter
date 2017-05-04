<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Currency;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class CurrenciesController extends Controller
{

    public function index()
    {
      $currencies = Currency::all();

      return view('currencies.index', compact('currencies'));
    }


    public function truncate()
    {
      Currency::truncate();
    }


    public function updateCurrencies(Request $request)
    {
      $client = new \GuzzleHttp\Client(['base_uri' => 'https://openexchangerates.org/api/']);
      $responseNames = $client->request('GET', 'currencies.json')->getBody();
      $responseRates = $client->request('GET', 'latest.json?app_id=fb2b4ec98d4c4b2fa004e15733069be8')->getBody();

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
