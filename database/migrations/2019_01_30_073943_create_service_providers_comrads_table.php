<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceProvidersComradsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_providers_comrads', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('s_id');

            $table->string('c_name')->nullable();
            $table->string('c_phone_no')->nullable();
            $table->string('c_alt_phone_no')->nullable();
            $table->string('c_nid')->nullable();
            $table->string('c_card')->nullable();
            $table->string('c_nic_front')->nullable();
            $table->string('c_nic_back')->nullable();
            $table->string('c_passport')->nullable();
            $table->timestamps();
            $table->foreign('s_id')
                ->references('id')->on('service_providers')
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
        Schema::dropIfExists('service_providers_comrads');
    }
}
