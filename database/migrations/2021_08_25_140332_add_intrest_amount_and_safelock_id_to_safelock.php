<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIntrestAmountAndSafelockIdToSafelock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('safelocks', function (Blueprint $table) {
            $table->double('interest_amount')->unsigned()->after('amount')->nullable();
            $table->string('safelock_id')->after('id')->nullable()->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('safelock', function (Blueprint $table) {
            //
        });
    }
}
