<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MetodePembayaran extends Model
{
    protected $table = 'metode_pembayaran';

    protected $primaryKey = 'id_metode_pembayaran';

    public $timestamps = false;

    protected $fillable = [
        'nama_metode',
    ];

    public function pembayaran(): HasMany
    {
        return $this->hasMany(Pembayaran::class, 'id_metode_pembayaran', 'id_metode_pembayaran');
    }
}
