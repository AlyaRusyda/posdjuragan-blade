<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notif extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
     // Definisikan atribut dan metode sesuai kebutuhan Anda
     protected $fillable = ['teks', 'audio', 'status'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('teks', 'like', '%' . $search . '%')
                ->orWhere('audio', 'like', '%' . $search . '%');
        });
        
    }
}
