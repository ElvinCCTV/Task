<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'slug', 'hh_id', 'region'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
