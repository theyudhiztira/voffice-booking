<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FacilitySchedule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility_schedule', function (Blueprint $table) {
            $table->id();
            $table->foreignId('facility_id');
            $table->date('date');
            for ($i = 100; $i <= 2400; $i+=100) {
                $table->integer($i)->nullable()->default(null);
            }
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('facility_schedule');
    }
}
