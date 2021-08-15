<?php

namespace App\Models;

use App\Models\Career;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'id_type',
        'id_number',
        'genre',
        'date_of_birth',
        'career_id',
        'email_address',
        'phone_number'
    ];

    public function career()
    {
        return $this->belongsTo(Career::class, 'career_id');
    }
}
