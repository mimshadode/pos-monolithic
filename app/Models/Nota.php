<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Nota extends Model
{
    protected $table = 'nota';

    protected $primaryKey = 'kode_nota';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'kode_nota',
        'id_transaksi',
        'id_kasir',
        'tanggal_cetak',
        'total_transaksi',
        'catatan',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_cetak' => 'datetime',
            'total_transaksi' => 'decimal:2',
        ];
    }

    public function transaksi(): BelongsTo
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi', 'id_transaksi');
    }

    public function kasir(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class, 'id_kasir', 'id_user');
    }
}
