<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use HasFactory;
    use SoftDeletes;

    // Модель академічної групи

    protected $table = 'groups';
    protected $guarded = false;

    // Освітня програма даної групи
    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }




}
