<?php

namespace App\Service;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class ApiHandler {
  private $apiKey;
  private $apiUrl;
  private $client;
  private $names;
  private $rates;

  public function __construct(){
    $this->apiKey = getenv('OER_API_KEY');
    $this->apiUrl = getenv('OER_API_URL');
    $this->names = 'currencies.json';
    $this->rates = 'latest.json?app_id=' . $this->apiKey;
    $this->client = new \GuzzleHttp\Client(['base_uri' => $this->apiUrl]);
  }

/**
 * Construct the api call
 * @param  string $requestType HTTP request type
 * @param  string $endPoint    URL end point
 * @return object              json
 */
  public function getCurrencyData(string $requestType, string $endPoint){
    if ($endPoint === 'names'){
      $endPoint = $this->names;
    } else {
      $endPoint = $this->rates;
    }
    $response = $this->callApi($requestType, $endPoint);
    return $response;
  }

/**
 * Call the OER api
 * @param  string $requestType HTTP request type
 * @param  string $endPoint    URL end point
 * @return object              json
 */
  public function callApi(string $requestType, string $endPoint){
    try {
      $response = $this->client->request($requestType, $endPoint)->getBody();
    } catch (RequestException $e) {
      Log::error(Psr7\str($e->getRequest()));
      if ($e->hasResponse()) {
        Log::error(Psr7\str($e->getResponse()));
      }
    }
    return json_decode($response);
  }
}
