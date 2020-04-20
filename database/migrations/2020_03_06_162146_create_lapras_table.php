<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lapras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul');
            $table->string('isi', 150);
            $table->string('foto', 255);
            $table->string('tempat', 50);
            $table->string('harga', 50);
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
        Schema::dropIfExists('lapras');
    }
}
