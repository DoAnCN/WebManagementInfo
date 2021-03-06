<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instance', function (Blueprint $table) {
            $table->increments('id');
            $table->string('inst_name')->unique();
            $table->string('db_name');
            $table->string('domain');
            $table->string('version');
            $table->string('user_deployed')->nullable();
            $table->string('status')->nullable();
            $table->integer('id_project')->unsigned();
            $table->foreign('id_project')->references('id')->on('project');
            $table->integer('id_host')->unsigned();
            $table->foreign('id_host')->references('id')->on('host');
            $table->dateTime('time_deployed')->nullable();
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
        Schema::dropIfExists('instance');
    }
}
