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
        Schema::table('accounts', function (Blueprint $table) {
            $table->string('remember_token')->nullable();
            $table->dropColumn('street_name');
            $table->dropColumn('street_number');
            $table->dropColumn('street_additional');
            $table->dropColumn('city');
            $table->dropColumn('country');
            $table->dropColumn('postal_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->string('street_name');
            $table->integer('street_number');
            $table->string('street_additional');
            $table->string('city');
            $table->string('country');
            $table->string('postal_code');
        });
    }
};
