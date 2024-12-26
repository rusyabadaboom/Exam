<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'author',
        'title',
        'cover',
        'pages',
        'year',
        'isbn',
        'publisher_id',
    ];

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function issuances()
    {
        return $this->hasMany(Issuance::class);
    }
}
