<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Career extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code_number',
        'code_string'
    ];

    public function students()
    {
        return $this->hasMany(Student::class, 'career_id');
    }
}
