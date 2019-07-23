<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_providers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('type')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('alt_ph')->nullable();
            $table->string('email')->nullable();
            $table->string('mailing_add')->nullable();
            $table->string('smart_card')->nullable();
            $table->string('nic_front')->nullable();
            $table->string('nic_back')->nullable();
            $table->string('passport')->nullable();
            $table->string('tin_cer')->nullable();
            $table->string('mobile_banking')->nullable();
            $table->string('mfs_account')->nullable();
            $table->string('mfs_spname')->nullable();
            $table->string('cat')->nullable();


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
        Schema::dropIfExists('service_providers');
    }
}
