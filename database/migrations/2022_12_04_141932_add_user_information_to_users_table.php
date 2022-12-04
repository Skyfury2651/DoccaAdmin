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
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('identify_number')->nullable();
            $table->string('work_location')->nullable();
            $table->integer('lat')->nullable();
            $table->integer('lng')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('avatar');
            $table->dropColumn('phone_number');
            $table->dropColumn('identify_number');
            $table->dropColumn('work_location');
            $table->dropColumn('lat');
            $table->dropColumn('lng');
        });
    }
};
