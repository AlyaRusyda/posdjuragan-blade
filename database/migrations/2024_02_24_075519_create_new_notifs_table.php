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
        Schema::create('notifs', function (Blueprint $table) {
            $table->id();
            $table->string('teks');
            $table->string('audio');
            $table->enum('status', ['active', 'non_active']);
            $table->unsignedBigInteger('id_order');
            $table->char('id_employee');
            $table->timestamps();

            $table->foreign('id_order')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('id_employee')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notifs', function (Blueprint $table) {
            $table->dropForeign(['id_order']);
            $table->dropForeign(['id_employee']);
        });
        Schema::dropIfExists('notifs');
    }
};
