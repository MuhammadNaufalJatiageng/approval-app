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
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('deskripsi');
            $table->string('divisi');
            $table->string('file_permohonan_adp');
            $table->string('file_estimasi_adp');
            $table->string('no_adp');
            $table->string('no_capex');
            $table->boolean('ofc');
            $table->boolean('gl');
            $table->boolean('manager');
            $table->boolean('fm');
            $table->boolean('acc');
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
        Schema::dropIfExists('proposals');
    }
};
