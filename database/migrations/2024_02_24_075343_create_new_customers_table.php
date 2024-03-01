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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->date('register_date')->nullable();
            $table->integer('phone');
            $table->integer('phone2');
            $table->text('address');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->integer('kodepos');
            $table->char('cs_id', 36)->nullable();
            $table->timestamps();

            $table->foreign('cs_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropForeign(['cs_id']);
        });
        Schema::dropIfExists('customers');
    }
};
