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
        Schema::create('laporan_detail', function (Blueprint $table) {
            $table->bigIncrements('id_detail');
            $table->unsignedBigInteger('id_laporan');
            $table->unsignedBigInteger('id_transaksi');
            $table->decimal('total_transaksi', 12, 2);
            $table->dateTime('created_at')->useCurrent();

            $table->unique(['id_laporan', 'id_transaksi'], 'uq_laporan_transaksi');

            $table->foreign('id_laporan')
                ->references('id_laporan')
                ->on('laporan')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('id_transaksi')
                ->references('id_transaksi')
                ->on('transaksi')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_detail');
    }
};
