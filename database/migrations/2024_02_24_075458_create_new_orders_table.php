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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->date('order_date');
            $table->unsignedBigInteger('juragan');
            $table->unsignedBigInteger('id_customer');
            $table->string('payment_method');
            $table->string('source');
            $table->char('served_by', 36);
            $table->enum('tujuan_bayar', ['BRI (Nama CS)', 'Tunggu Konfirmasi Pembayaran', 'Cicilan / Kredit', 'Ada kelebihan', 'Sudah Lunas'])->nullable();
            $table->date('tgl_bayar')->nullable();
            $table->integer('jumlah_dana')->nullable();
            $table->unsignedBigInteger('id_produk');
            $table->enum('size', ['M', 'L', 'XL', 'XXL']);
            $table->enum('kelengkapan', ['Lengkap', 'Belum Lengkap'])->nullable();
            $table->integer('quantity');
            $table->integer('total_amount');
            $table->integer('paid_amount');
            $table->integer('remaining_amount');
            $table->text('notes')->nullable(); // Menghapus default value
            $table->enum('status', ['belum_proses', 'cek_pembayaran', 'dalam_proses', 'orderan_selesai'])->default('belum_proses');
            $table->string('keterangan_status')->nullable();
            $table->date('deadline');
            $table->timestamps();

            $table->foreign('id_customer')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('served_by')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('id_produk')->references('id')->on('barangs')->onDelete('cascade');
            $table->foreign('juragan')->references('id')->on('juragans')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['id_customer']);
            $table->dropForeign(['served_by']);
            $table->dropForeign(['id_produk']);
            $table->dropForeign(['juragan']);
        });

        Schema::dropIfExists('orders');
    }
};
