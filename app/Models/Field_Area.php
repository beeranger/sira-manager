<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field_Area extends Model
{
    use HasFactory;

    protected $guided = ['id'];

    public function employees()
    {
        return $this -> hasMany(Employee::class);
    }
}
