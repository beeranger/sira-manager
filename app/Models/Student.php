<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'nisn',
        'nis',
        'year_enrolled',
        'year_graduated',
        'status',
        'nik',
        'birth_date',
        'address',
        'gender_id',
        'religion',
        'father_name',
        'father_phone',
        'father_occupation',
        'father_income',
        'mother_name',
        'mother_phone',
        'mother_occupation',
        'mother_income',
        'guardian_name',
        'guardian_phone',
        'guardian_occupation',
        'guardian_income',
        'guardian_relationship',
        'kindergarten',
        'elementary',
        'juniorhs'
    ];

    protected $with = ['gender','year'];

    public function gender()
    {
        return $this -> belongsTo(Gender::class);
    }

    public function year()
    {
        return $this -> belongsTo(Year::class);
    }

    public function getRouteKeyName()
    {
        return 'nis';
    }

}
