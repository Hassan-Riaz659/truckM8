<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loads', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('customer');
            $table->date('pickup_date')->nullable();
            $table->date('destination_date')->nullable();
            $table->string('pickup_location')->nullable();
            $table->string('drop_off_location')->nullable();
            $table->integer('distance')->nullable();
            $table->longText('description')->nullable();
            $table->integer('quantity');
            $table->string('customer_reference')->nullable();
            $table->integer('load_number')->nullable();
            $table->longText('additional_details')->nullable();
            $table->string('vehicle')->nullable();
            $table->string('driver')->nullable();    
            $table->longText('notes')->nullable();
            $table->integer('Rate');
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
        Schema::dropIfExists('loads');
    }
}
