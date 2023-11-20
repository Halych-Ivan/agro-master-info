<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Statement extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = 'statements';
    protected $guarded = false;
    protected $casts = [
        'students' => 'array', // Кастуємо поле students як масив
    ];


    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }





}
