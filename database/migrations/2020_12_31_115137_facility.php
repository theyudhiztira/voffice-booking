<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Facility extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility', function (Blueprint $table) {
            $table->id();
            $table->string('facility_name');
            $table->integer('location_id');
            $table->integer('capacity');
            $table->integer('deduction_rate');
            $table->integer('start_time');
            $table->integer('end_time');
            $table->string('image')->nullable()->default(null);
            $table->boolean('weekend_operation')->nullable()->default(false);
            $table->boolean('status')->nullable()->default(true);
            $table->foreignId('created_by');
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
        Schema::drop('facility');
    }
}
