<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $table = 'location';

    public function created_by_details()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }
}
