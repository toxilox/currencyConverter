<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'iso_4217', 'name', 'date_created', 'date_modified', 'rate',
    ];
}
