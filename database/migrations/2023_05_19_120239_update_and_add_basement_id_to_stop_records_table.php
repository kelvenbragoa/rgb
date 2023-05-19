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
        Schema::table('stop_records', function (Blueprint $table) {
            //
            $table->integer('basement_id')->after('ship_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stop_records', function (Blueprint $table) {
            //
            $table->dropColumn('basement_id');
        });
    }
};
