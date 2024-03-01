<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juragan extends Model
{
    use HasFactory;

    protected $fillable = ['name_juragan', 'cs_id'];
    protected $tabel = 'juragans';
}
