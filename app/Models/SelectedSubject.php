<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SelectedSubject extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = 'selected_subjects';
    protected $guarded = false;


    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }


    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }







}
