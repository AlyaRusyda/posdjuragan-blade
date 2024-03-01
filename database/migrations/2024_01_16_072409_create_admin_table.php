<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   /**
    * Run the migrations.
    */
   public function up(): void
   {
       Schema::create('admin', function (Blueprint $table) {
           $table->uuid('id')->primary()->default(DB::raw('(UUID())'));
           $table->string('name', 100);
           $table->string('email', 100)->unique();
           $table->string('username', 100)->unique();
           $table->string('password');
           $table->string('profile_image')->nullable();
           $table->string('place_of_birth', 100);
           $table->string('role')->default('admin');
           $table->date('date_of_birth');
           $table->enum('gender', ['male', 'female']);
           $table->string('phone_number', 15);
           $table->text('address');
           $table->timestamps();
       });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
       Schema::dropIfExists('admin');
   }
};
