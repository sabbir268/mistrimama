<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DaysColum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('s_p_service_times', function (Blueprint $table) {
            $table->unsignedInteger('d_id')->nullable();


            $table->foreign('d_id')
                ->references('id')->on('s_p_service_days')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('s_p_service_times', function (Blueprint $table) {
            //
        });
    }
}
