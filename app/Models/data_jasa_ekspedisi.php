<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class data_jasa_ekspedisi extends Model
{
    use HasFactory;

    // protected $fillable = ['uuid'];
    protected $guarded = [];
    protected $keyType = 'string';
    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function($model)
        {
            if($model->getKey() == null) {
                $model->setAttribute($model->getKeyname(), Str::uuid()->toString());
            }
        });
    }
}
