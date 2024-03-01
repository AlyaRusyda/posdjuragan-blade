<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $casts = [ 'id' => 'string' ];
    protected $fillable = [
        'name', 'email', 'username', 'password', 'profile_image', 'gender', 'phone_number', 'address', 'role', 'email_verifed_at'
    ];

    protected $table = 'employees';

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('toko', 'like', '%' . $search . '%');
        });

        $query->when(isset($filters['role']) && $filters['role'] === 'cs', function ($query) {
            return $query->where('role', 'cs');
        });
        $query->when(isset($filters['role']) && $filters['role'] === 'admin', function ($query) {
            return $query->where('role', 'admin');
        });
        $query->when(isset($filters['role']) && $filters['role'] === 'superAdmin', function ($query) {
            return $query->where('role', 'superAdmin');
        });
    }

    public function orders(){
        return $this->hasMany(Order::class, 'served_by');
    }

    public function hasAnyRole($roles)
    {
        return in_array($this->role, $roles);
    }
}
