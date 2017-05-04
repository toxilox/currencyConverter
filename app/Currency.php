<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    const CREATED_AT = 'date_created';
    const UPDATED_AT = 'date_modified';

    protected $fillable = [
        'iso_4217', 'name', 'rate',
    ];
}
