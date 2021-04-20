<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    use \Awobaz\Compoships\Compoships;

    protected $table = 'booking';

    public function facility()
    {
        return $this->hasOne('\App\Models\Facility', 'id', 'facility_id');
    }

    public function client()
    {
        return $this->hasOne('\App\Models\Client', 'id', 'client_id');
    }

    public function schedule()
    {
        return $this->hasMany('\App\Models\FacilitySchedule', ['facility_id', 'date'], ['facility_id', 'booking_date']);
    }
}
