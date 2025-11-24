<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $primaryKey = 'id_transaksi';

    protected $fillable = [
        'kode_transaksi',
        'id_pemesanan',
        'id_pembayaran',
        'tanggal_transaksi',
        'total_harga',
        'status_transaksi',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_transaksi' => 'datetime',
            'total_harga' => 'decimal:2',
        ];
    }

    public function pemesanan(): BelongsTo
    {
        return $this->belongsTo(Pemesanan::class, 'id_pemesanan', 'id_pemesanan');
    }

    public function pembayaran(): BelongsTo
    {
        return $this->belongsTo(Pembayaran::class, 'id_pembayaran', 'id_pembayaran');
    }

    public function nota(): HasOne
    {
        return $this->hasOne(Nota::class, 'id_transaksi', 'id_transaksi');
    }

    public function laporanDetail(): HasMany
    {
        return $this->hasMany(LaporanDetail::class, 'id_transaksi', 'id_transaksi');
    }
}
