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
            $table->string('name')->unique();
            $table->string('db_name')->unique();
            $table->string('domain');
            $table->string('version');
            $table->string('user_deployed')->nullable();
            $table->string('status')->nullable();
            $table->integer('id_project')->unsigned();
            $table->foreign('id_project')->references('id')->on('project')->onDelete('cascade');
            $table->integer('id_host')->unsigned();
            $table->foreign('id_host')->references('id')->on('host')->onDelete('cascade');
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
