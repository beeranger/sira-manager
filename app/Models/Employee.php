<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $with = ['user','title','edu','gender','group','certification','field_area'];

    protected $fillable =[
        'name',
        'nip',
        'nik',
        'npwp',
        'address',
        'religion',
        'group_id',
        'title_id',
        'education_id_1',
        'education_id_2',
        'field_area_id_1',
        'field_area_id_2',
        'certification_id_1',
        'certification_id_2',
        'certification_id_3',
        'institution_1',
        'institution_2',
        'institution_3',
        'email',
        'gender_id',
        'phone',
        'join_date',
        'birth_date',
    ];

    protected $guarded = ['id'];


    public function user()
    {
        return $this -> belongsTo(User::class,'user_id');
    }

    public function title()
    {
        return $this -> belongsTo(Title::class);
    }

    public function edu()
    {
        return $this -> belongsTo(Edu::class);
    }

    public function gender()
    {
        return $this -> belongsTo(Gender::class);
    }

    public function group()
    {
        return $this -> belongsTo(Group::class);
    }

    public function certification()
    {
        return $this -> belongsTo(Certification::class);
    }

    public function field_area()
    {
        return $this -> belongsTo(Field_Area::class);
    }

    public function getRouteKeyName()
    {
        return 'nip';
    }
}
