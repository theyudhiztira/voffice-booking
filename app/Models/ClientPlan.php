<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientPlan extends Model
{
    protected $table = 'client_plan';

    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }

    public function client()
    {
        return $this->hasOne('\App\Models\Client', 'id', 'client_id');
    }
}
