<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceProvidersServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_providers_services', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('s_id');
            $table->unsignedInteger('sc_id');

            $table->string('s_price')->nullable();
            $table->string('s_comm')->nullable();
            $table->string('s_desp')->nullable();
            $table->foreign('s_id')
                ->references('id')->on('service_providers')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sc_id')
                ->references('id')->on('sub_categories')
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
        Schema::dropIfExists('service_providers_services');
    }
}
