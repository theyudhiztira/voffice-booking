<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilitySchedule extends Model
{
    use \Awobaz\Compoships\Compoships;

    protected $table = 'facility_schedule';

    protected $fillable = [
        'facility_id',
        'date',
        '100',
        '200',
        '300',
        '400',
        '500',
        '600',
        '700',
        '800',
        '900',
        '1000',
        '1100',
        '1200',
        '1300',
        '1400',
        '1500',
        '1600',
        '1700',
        '1800',
        '1900',
        '2000',
        '2100',
        '2200',
        '2300',
        '2400'
    ];

    public function booking_100(){
        return $this->hasOne('App\Models\Booking', 'id', 100);
    }

    public function booking_200(){
        return $this->hasOne('App\Models\Booking', 'id', 200);
    }

    public function booking_300(){
        return $this->hasOne('App\Models\Booking', 'id', 300);
    }

    public function booking_400(){
        return $this->hasOne('App\Models\Booking', 'id', 400);
    }

    public function booking_500(){
        return $this->hasOne('App\Models\Booking', 'id', 500);
    }

    public function booking_600(){
        return $this->hasOne('App\Models\Booking', 'id', 600);
    }

    public function booking_700(){
        return $this->hasOne('App\Models\Booking', 'id', 700);
    }

    public function booking_800(){
        return $this->hasOne('App\Models\Booking', 'id', 800);
    }

    public function booking_900(){
        return $this->hasOne('App\Models\Booking', 'id', 900);
    }

    public function booking_1000(){
        return $this->hasOne('App\Models\Booking', 'id', 1000);
    }

    public function booking_1100(){
        return $this->hasOne('App\Models\Booking', 'id', 1100);
    }

    public function booking_1200(){
        return $this->hasOne('App\Models\Booking', 'id', 1200);
    }

    public function booking_1300(){
        return $this->hasOne('App\Models\Booking', 'id', 1300);
    }

    public function booking_1400(){
        return $this->hasOne('App\Models\Booking', 'id', 1400);
    }

    public function booking_1500(){
        return $this->hasOne('App\Models\Booking', 'id', 1500);
    }

    public function booking_1600(){
        return $this->hasOne('App\Models\Booking', 'id', 1600);
    }

    public function booking_1700(){
        return $this->hasOne('App\Models\Booking', 'id', 1700);
    }

    public function booking_1800(){
        return $this->hasOne('App\Models\Booking', 'id', 1800);
    }

    public function booking_1900(){
        return $this->hasOne('App\Models\Booking', 'id', 1900);
    }

    public function booking_2000(){
        return $this->hasOne('App\Models\Booking', 'id', 2000);
    }

    public function booking_2100(){
        return $this->hasOne('App\Models\Booking', 'id', 2100);
    }

    public function booking_2200(){
        return $this->hasOne('App\Models\Booking', 'id', 2200);
    }

    public function booking_2300(){
        return $this->hasOne('App\Models\Booking', 'id', 2300);
    }

    public function booking_2400(){
        return $this->hasOne('App\Models\Booking', 'id', 2400);
    }

}
