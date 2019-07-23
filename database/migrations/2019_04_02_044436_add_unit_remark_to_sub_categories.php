<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUnitRemarkToSubCategories extends Migration
{

    public function up()
    {
        Schema::table('sub_categories', function (Blueprint $table) {
            $table->text('unit_remark')->nullable()->after('price');
        });
    }

    public function down()
    {
        Schema::table('sub_categories', function (Blueprint $table) {
            //
        });
    }
}
