<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Laporan extends Model
{
    protected $table = 'laporan';

    protected $primaryKey = 'id_laporan';

    public $timestamps = false;

    protected $fillable = [
        'periode_mulai',
        'periode_selesai',
        'jenis',
        'keterangan',
    ];

    protected function casts(): array
    {
        return [
            'periode_mulai' => 'date',
            'periode_selesai' => 'date',
        ];
    }

    public function detail(): HasMany
    {
        return $this->hasMany(LaporanDetail::class, 'id_laporan', 'id_laporan');
    }
}
