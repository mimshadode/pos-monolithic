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
        Schema::create('item_pemesanan', function (Blueprint $table) {
            $table->bigIncrements('id_item');
            $table->unsignedBigInteger('id_pemesanan');
            $table->unsignedBigInteger('id_produk');
            $table->integer('qty');
            $table->decimal('harga_satuan', 12, 2);
            $table->decimal('diskon', 12, 2)->default(0);
            $table->decimal('subtotal', 12, 2);
            $table->string('catatan', 255)->nullable();
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('id_pemesanan')
                ->references('id_pemesanan')
                ->on('pemesanan')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('id_produk')
                ->references('id_produk')
                ->on('produk')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_pemesanan');
    }
};
