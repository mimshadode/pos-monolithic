<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';

    protected $primaryKey = 'id_pembayaran';

    public $timestamps = false;

    protected $fillable = [
        'id_pemesanan',
        'id_user',
        'id_metode_pembayaran',
        'total_tagihan',
        'jumlah_dibayar',
        'status_pembayaran',
        'tanggal_pembayaran',
        'keterangan',
    ];

    protected function casts(): array
    {
        return [
            'total_tagihan' => 'decimal:2',
            'jumlah_dibayar' => 'decimal:2',
            'tanggal_pembayaran' => 'datetime',
        ];
    }

    public function pemesanan(): BelongsTo
    {
        return $this->belongsTo(Pemesanan::class, 'id_pemesanan', 'id_pemesanan');
    }

    public function kasir(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class, 'id_user', 'id_user');
    }

    public function metodePembayaran(): BelongsTo
    {
        return $this->belongsTo(MetodePembayaran::class, 'id_metode_pembayaran', 'id_metode_pembayaran');
    }

    public function transaksi(): HasOne
    {
        return $this->hasOne(Transaksi::class, 'id_pembayaran', 'id_pembayaran');
    }
}
