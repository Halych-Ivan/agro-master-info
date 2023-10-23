<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'teachers';
    protected $guarded = false;

    public function cathedra()
    {
        return $this->belongsTo(Cathedra::class);
    }


    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'teacher_subject');
    }


}
