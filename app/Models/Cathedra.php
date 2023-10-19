<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cathedra extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'cathedras';
    protected $guarded = false;


    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }


    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
}
