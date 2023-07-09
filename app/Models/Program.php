<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use HasFactory;
    use SoftDeletes;

    // Модель освітньої програми

    protected $table = 'programs';
    protected $guarded = false;


    // рівень освіти
    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }

    // спеціальність
    public function specialty()
    {
        return $this->belongsTo(Specialty::class, 'specialty_id');
    }


    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
