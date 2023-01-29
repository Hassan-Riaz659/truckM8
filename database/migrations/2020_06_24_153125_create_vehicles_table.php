<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('unit_number');
            $table->string('vehicle_name');
            $table->string('vehicle_description')->nullable();
            $table->boolean('vehicle_type');
            $table->string('registration_plate')->nullable();
            $table->string('year')->nullable();
            $table->string('make')->nullable();
            $table->string('VIN')->nullable();
            $table->string('gross_combined_mass')->nullable();
            $table->timestamps();
        });



        //(truck/trailer)

        


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
