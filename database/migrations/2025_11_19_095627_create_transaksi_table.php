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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->bigIncrements('id_transaksi');
            $table->string('kode_transaksi', 40)->unique();
            $table->unsignedBigInteger('id_pemesanan')->unique();
            $table->unsignedBigInteger('id_pembayaran')->unique();
            $table->dateTime('tanggal_transaksi')->useCurrent();
            $table->decimal('total_harga', 12, 2);
            $table->enum('status_transaksi', ['selesai', 'batal', 'pending'])->default('selesai');
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('id_pemesanan')
                ->references('id_pemesanan')
                ->on('pemesanan')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('id_pembayaran')
                ->references('id_pembayaran')
                ->on('pembayaran')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
