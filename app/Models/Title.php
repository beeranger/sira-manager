<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;


class Title extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $fillable = ['name','slug','disable','view','add','edit','delete','download'];

    public function employees()
    {
        return $this -> hasMany(Employee::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    

}
