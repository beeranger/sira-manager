<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;
        
    protected $guarded = ['id'];

    public function employees()
    {
        return $this -> hasMany(Employee::class);
    }
    public function students()
    {
        return $this -> hasMany(Student::class);
    }
}
