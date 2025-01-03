<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kategori_id',
        'produk_id',
        'akun_game',
        'quantity',
        'total_harga',
        'kupon',
        'diskon',
        'final_harga',
        'bukti_pembayaran',
        'Status',
    ];
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
