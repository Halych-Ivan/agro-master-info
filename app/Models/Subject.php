<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = 'subjects';
    protected $guarded = false;


    public function cathedra()
    {
        return $this->belongsTo(Cathedra::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_subject')->withPivot('is_main');
    }

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }

    public function selectedSubject()
    {
        return $this->hasOne(SelectedSubject::class);
    }




}
