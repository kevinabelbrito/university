<?php

namespace App\Models;

use App\Models\Career;
use Illuminate\Support\Facades\DB;
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

    public function scopeListSearch($query, $search)
    {
        return $search != ''
                ? $query->select('students.*')
                        ->leftJoin('careers', 'students.career_id', '=', 'careers.id')
                        ->where(DB::raw('lower(students.first_name)'), 'LIKE', '%'.strtolower($search).'%')
                        ->orWhere(DB::raw('lower(students.last_name)'), 'LIKE', '%'.strtolower($search).'%')
                        ->orWhere(DB::raw('lower(students.id_number)'), 'LIKE', '%'.strtolower($search).'%')
                        ->orWhere(DB::raw('lower(careers.name)'), 'LIKE', '%'.strtolower($search).'%')
                        ->orWhere(DB::raw('lower(students.email_address)'), 'LIKE', '%'.strtolower($search).'%')
                        ->orWhere(DB::raw('lower(students.phone_number)'), 'LIKE', '%'.strtolower($search).'%')
                : NULL;
    }
}
