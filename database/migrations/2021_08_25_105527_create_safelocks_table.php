<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSafelocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('safelocks', function (Blueprint $table) {
            $table->id();
            // create column for referencing users table
            $table->integer('user_id')->unsigned()
            ->reference('id')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->integer('amount')->default(0);
            $table->date('return_date');
            $table->string('description');
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
        Schema::dropIfExists('safelocks');
    }
}
