<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
<<<<<<< HEAD
=======
    protected $primaryKey = 'id';
>>>>>>> 2291dd17b89b67b21358656895fd1414dafcc3b0

    protected $fillable = [
        'name',
        'photo',
    ];

    protected $hidden = ['photo'];

    protected $appends = ['course_image'];

    public function courseImage(): Attribute
    {
        return new Attribute(
            get: fn () => $this->photo ? url("storage/{$this->photo}") : null
        );
    }
}
