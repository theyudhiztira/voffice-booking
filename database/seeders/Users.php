<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'name' => 'Pandu',
            'email' => 'theyudhiztira@gmail.com',
            'password' => \Hash::make('sherlyda101')
        ]);
    }
}
