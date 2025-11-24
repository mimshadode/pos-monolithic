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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->bigIncrements('id_pembayaran');
            $table->unsignedBigInteger('id_pemesanan')->unique();
            $table->unsignedBigInteger('id_user');
            $table->unsignedInteger('id_metode_pembayaran');
            $table->decimal('total_tagihan', 12, 2);
            $table->decimal('jumlah_dibayar', 12, 2)->default(0);
            $table->enum('status_pembayaran', ['belum_lunas', 'sebagian', 'lunas'])->default('belum_lunas');
            $table->dateTime('tanggal_pembayaran')->useCurrent();
            $table->string('keterangan', 255)->nullable();

            $table->foreign('id_pemesanan')
                ->references('id_pemesanan')
                ->on('pemesanan')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('id_user')
                ->references('id_user')
                ->on('pengguna')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('id_metode_pembayaran')
                ->references('id_metode_pembayaran')
                ->on('metode_pembayaran')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
