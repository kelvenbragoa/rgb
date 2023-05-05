<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tally_books', function (Blueprint $table) {
            $table->id();
            $table->integer('ship_id');
            $table->integer('shift_ship_id');
            $table->integer('basement_id');
            $table->float('load',8,2);
            $table->integer('qty_truck');
            $table->integer('qty_load');
            $table->integer('type_of_bag_id');
            $table->integer('tally_clerk_id');
            $table->integer('tally_clerk_ship_id');
            $table->integer('created_by_user_id');
            $table->integer('type_merchandise_id');
            $table->integer('operation_station_id');
            $table->integer('customer_id');
            $table->integer('agent_id');
            $table->date('date');
            $table->time('time');
            $table->string('name')->nullable();
            $table->string('bi')->nullable();
            $table->string('truck_plate')->nullable();
            $table->string('trailer_plate')->nullable();
            $table->text('obs')->nullable();
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
        Schema::dropIfExists('tally_books');
    }
};
