<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('host', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Ten_host')->unique();
            $table->string('IP');
            $table->integer('Port');
            $table->string('HDH');
            $table->integer('Soluong_instance');
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
        Schema::dropIfExists('host');
    }
}
