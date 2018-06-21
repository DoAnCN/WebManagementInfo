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
            $table->string('Ten_instance')->unique();
            $table->string('Ten_database')->unique();
            $table->string('Domain');
            $table->string('Version');
            $table->string('Deloy_user');
            $table->string('Status');
            $table->integer('Project_id')->unsigned();
            $table->foreign('Project_id')->references('id')->on('project')->onDelete('cascade');
            $table->integer('Host_id')->unsigned();
            $table->foreign('Host_id')->references('id')->on('host')->onDelete('cascade');
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
