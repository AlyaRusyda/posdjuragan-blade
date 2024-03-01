<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = ['kd_produk', 'nama', 'size', 'harga_satuan', 'stock', 'img', 'video', 'point'];
    protected $guarded = ['id'];
        // protected $with = ['kd_produk'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('nama', 'like', '%' . $search . '%')
                ->orWhere('kd_produk', 'like', '%' . $search . '%');
        });
    }
}
