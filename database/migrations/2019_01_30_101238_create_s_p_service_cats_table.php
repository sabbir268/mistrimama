<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSPServiceCatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_p_service_cats', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('s_id');
            $table->string('cats')->nullable();

            $table->foreign('s_id')
                ->references('id')->on('service_providers')
                ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('s_p_service_cats');
    }
}
