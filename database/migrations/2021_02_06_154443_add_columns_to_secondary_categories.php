<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToSecondaryCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('secondary_categories', function (Blueprint $table) {
            $table->string('name');
            $table->string('sort_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('secondary_categories', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('sort_no');
        });
    }
}
