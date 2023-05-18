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
        Schema::table('ships', function (Blueprint $table) {
            //
            $table->time('ladder_positioning_out_time')->nullable()->after('ladder_positioning_time');
            $table->time('migration_on_board_out_time')->nullable()->after('migration_on_board_time');
            $table->time('inspection_out_time')->nullable()->after('inspection_time');
            $table->time('material_positioning_out_time')->nullable()->after('material_positioning_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ships', function (Blueprint $table) {
            //
            $table->dropColumn('ladder_positioning_out_time');
            $table->dropColumn('migration_on_board_out_time');
            $table->dropColumn('inspection_out_time');
            $table->dropColumn('material_positioning_out_time');
        });
    }
};
