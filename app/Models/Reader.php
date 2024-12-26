<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    use HasFactory;

    protected $fillable = [
        'fio',
        'address',
        'phone',
    ];

    public function issuances()
    {
        return $this->hasMany(Issuance::class);
    }
}
