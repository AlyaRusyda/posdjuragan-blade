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
        Schema::create('juragan_manager', function (Blueprint $table) {
            $table->id();
            $table->char('cs_id');
            $table->unsignedBigInteger('juragan_id');
            $table->timestamps();

            $table->foreign('cs_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('juragan_id')->references('id')->on('juragans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('juragan_manager');
    }
};
