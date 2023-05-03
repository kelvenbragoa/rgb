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
        Schema::create('ships', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('customer_id');
            $table->date('landing_date');
            $table->time('landing_time');
            $table->date('departure_date')->nullable();
            $table->time('departure_time')->nullable();
            $table->string('agent');
            $table->integer('type_merchandise_id');
            $table->string('cm')->nullable();
            $table->string('work_order')->nullable();
            $table->integer('type_operation_id');
            $table->integer('created_by_user_id');

            $table->date('first_rope_release_date')->nullable();
            $table->time('first_rope_release_time')->nullable();

            $table->date('last_rope_release_date')->nullable();
            $table->time('last_rope_release_time')->nullable();

            $table->date('ladder_positioning_date')->nullable();
            $table->time('ladder_positioning_time')->nullable();

            $table->date('migration_on_board_date')->nullable();
            $table->time('migration_on_board_time')->nullable();

            $table->date('inspection_date')->nullable();
            $table->time('inspection_time')->nullable();

            $table->date('material_positioning_date')->nullable();
            $table->time('material_positioning_time')->nullable();

            $table->date('start_operation_date')->nullable();
            $table->time('start_operation_time')->nullable();
            $table->integer('operation_station_id');
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
        Schema::dropIfExists('ships');
    }
};
