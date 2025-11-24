<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produk extends Model
{
    protected $table = 'produk';

    protected $primaryKey = 'id_produk';

    protected $fillable = [
        'kode_produk',
        'nama_produk',
        'deskripsi',
        'harga',
        'stok',
        'status',
        'id_kategori',
    ];

    public function index()
    {
        $products = Produk::all();
        return view('produk.index', ['products' => $products]);
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

    public function itemPemesanan(): HasMany
    {
        return $this->hasMany(ItemPemesanan::class, 'id_produk', 'id_produk');
    }
}
