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
        Schema::create('used_equipments', function (Blueprint $table) {
            $table->id();
            $table->integer('ship_id');
            $table->integer('shift_ship_id');
            $table->timestamp('start_date');
            
            $table->timestamp('end_date')->nullable();
            
            $table->string('name');
            $table->string('reference');
            $table->string('operator');
            $table->integer('created_by_user_id');
            $table->integer('status');
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
        Schema::dropIfExists('used_equipments');
    }
};
