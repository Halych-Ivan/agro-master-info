<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialty extends Model
{
    use HasFactory;
    use SoftDeletes;

    // Модель спеціальності

    protected $table = 'specialties';
    protected $guarded = false;


    public function programs()
    {
        return $this->hasMany(Program::class);
    }

}
