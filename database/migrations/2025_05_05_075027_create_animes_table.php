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
        Schema::create('animes', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->string('judul');
            $table->unsignedBigInteger('id_jenis');
            //relasi
            $table->foreign('id_jenis')->references('id')->on('jenis')->onDelete('cascade');
            $table->longtext('desk');
            $table->string('foto');
            $table->string('penulis');
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
        Schema::dropIfExists('animes');
    }
};
