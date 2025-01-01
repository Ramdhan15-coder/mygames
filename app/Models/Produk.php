<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_id',
        'produk',
        'satuan',
        'harga',
        'stok',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
