<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    protected $table = 'roles';

    protected $primaryKey = 'id_role';

    public $timestamps = false;

    protected $fillable = [
        'kode_role',
        'nama_role',
        'keterangan',
    ];

    public function pengguna(): BelongsToMany
    {
        return $this->belongsToMany(Pengguna::class, 'pengguna_role', 'id_role', 'id_user')
            ->withPivot('assigned_at');
    }
}
