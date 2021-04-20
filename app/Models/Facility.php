<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $table = 'facility';

    public function location_details()
    {
        return $this->hasOne('App\Models\Location', 'id', 'location_id');
    }
}
