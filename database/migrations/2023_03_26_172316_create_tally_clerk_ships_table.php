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
        Schema::create('tally_clerk_ships', function (Blueprint $table) {
            $table->id();
            $table->integer('tally_clerk_id');
            $table->integer('user_id');
            $table->integer('ship_id');
            $table->integer('shift_ship_id');
            $table->integer('is_deleted');
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
        Schema::dropIfExists('tally_clerk_ships');
    }
};
