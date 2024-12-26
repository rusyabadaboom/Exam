<?php

namespace App\Models;  

use Illuminate\Database\Eloquent\Factories\HasFactory;  
use Illuminate\Database\Eloquent\Model;  

class Teacher extends Model  
{  
    use HasFactory;  

    protected $fillable = [  
        'first_name',  
        'last_name',  
        'email',  
        'date_of_birth',  
        'hire_date',  
        'phone_number',  
        'department',  
    ];  
}
