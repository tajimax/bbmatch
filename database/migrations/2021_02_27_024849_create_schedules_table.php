<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('address');
            $table->date('date');
            $table->string('P')->nullable();
            $table->string('C')->nullable();
            $table->string('FB')->nullable();
            $table->string('SB')->nullable();
            $table->string('TB')->nullable();
            $table->string('SS')->nullable();
            $table->string('LF')->nullable();
            $table->string('CF')->nullable();
            $table->string('RF')->nullable();
            $table->integer('member');
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
        Schema::dropIfExists('schedules');
    }
}
