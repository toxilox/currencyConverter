<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Currency extends Model
{
    const CREATED_AT = 'date_created';
    const UPDATED_AT = 'date_modified';

    // Allow these fields to be mass assigned
    protected $fillable = [
      'iso_4217', 'name', 'rate',
    ];

    protected $attributes = array(
      'name' => 'Not available',
    );

/**
 * Delete itself from the database
 */
    public function deleteSelf(){
      $this->delete();
    }

/**
 * Set the iso_4217 property
 * @param string $iso4217
 */
    public function setIso4217(string $iso4217){
      $this->iso_4217 = $iso4217;
    }

/**
 * Get the iso_4217 property
 * @return string
 */
    public function getIso4217(){
      return $this->iso_4217;
    }

/**
 * Set the name property
 * @param string $name
 */
    public function setName(string $name){
      $this->name = $name;
    }

/**
 * Get the name property
 * @return string
 */
    public function getName(){
      return $this->name;
    }

/**
 * Set the rate property
 * @param float $rate
 */
    public function setRate(float $rate){
      $this->rate = $rate;
    }

/**
 * Get the rate property
 * @return float
 */
    public function getRate(){
      return $this->rate;
    }

/**
 * Set the properties iso_4217, name and rate
 * @param string $iso4217
 * @param string $name
 * @param float  $rate    
 */
    public function setProperties(string $iso4217, string $name, float $rate){
      $this->setIso4217($iso4217);
      $this->setName($name);
      $this->setRate($rate);
    }
}
