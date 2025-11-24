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
        Schema::create('pengguna_role', function (Blueprint $table) {
            $table->unsignedBigInteger('id_user');
            $table->unsignedInteger('id_role');
            $table->dateTime('assigned_at')->useCurrent();

            $table->primary(['id_user', 'id_role']);
            $table->foreign('id_user')
                ->references('id_user')
                ->on('pengguna')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('id_role')
                ->references('id_role')
                ->on('roles')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengguna_role');
    }
};
