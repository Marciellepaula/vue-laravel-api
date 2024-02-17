<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

<<<<<<< HEAD
=======
    protected $primaryKey = 'id';
>>>>>>> 0de6205543eb16ded42c71b11a5e1a8c9bf72c7b
    protected $fillable = [
        'name',
        'photo',
    ];
}
