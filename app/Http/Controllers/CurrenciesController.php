<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Currency;

class CurrenciesController extends Controller
{
    //

    public function index()
    {
      $currencies = Currency::all();

      return view('currencies.index', compact('currencies'));
    }

    public function truncate()
    {
      Currency::truncate();
      $currencies = Currency::all();

      return view('currencies.index', compact('currencies'));
    }
}
