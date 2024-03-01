<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_jasa_ekspedisis', function (Blueprint $table) {
            $table->string('id')->primary(); 
            $table->integer('id_ekspedisi')->length(8);
            $table->string('nama_jasa_ekspedisi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_jasa_ekspedisis');
    }
};
