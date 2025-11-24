<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pengguna extends Model
{
    protected $table = 'pengguna';

    protected $primaryKey = 'id_user';

    protected $fillable = [
        'email',
        'username',
        'password_hash',
        'status',
    ];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'pengguna_role', 'id_user', 'id_role')
            ->withPivot('assigned_at');
    }

    public function pemesanan(): HasMany
    {
        return $this->hasMany(Pemesanan::class, 'id_user', 'id_user');
    }

    public function pembayaran(): HasMany
    {
        return $this->hasMany(Pembayaran::class, 'id_user', 'id_user');
    }

    public function nota(): HasMany
    {
        return $this->hasMany(Nota::class, 'id_kasir', 'id_user');
    }
}
