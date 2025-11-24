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
        Schema::create('nota', function (Blueprint $table) {
            $table->string('kode_nota', 50)->primary();
            $table->unsignedBigInteger('id_transaksi');
            $table->unsignedBigInteger('id_kasir');
            $table->dateTime('tanggal_cetak')->useCurrent();
            $table->decimal('total_transaksi', 12, 2);
            $table->string('catatan', 255)->nullable();
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('id_transaksi')
                ->references('id_transaksi')
                ->on('transaksi')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('id_kasir')
                ->references('id_user')
                ->on('pengguna')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nota');
    }
};
