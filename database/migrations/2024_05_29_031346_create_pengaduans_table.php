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
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nomor_hp');
            $table->text('perihal');
            $table->boolean('status')->default(false); // false = belum diverifikasi, true = diverifikasi
            $table->json('photos')->nullable(); // Menyimpan array path/URL foto
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
        Schema::dropIfExists('pengaduans');
    }
};
