<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Location extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('location')->insert([
            'name' => 'Centennial Tower',
            'address' => 'Centennial Tower, Centennial Tower Level 29, Jl. Jend Gatot Suboto No.27, RT.2/RW.2, Karet Semanggi, Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12950',
            'image' => 'default.png',
            'created_by' => 1
        ]);
    }
}
