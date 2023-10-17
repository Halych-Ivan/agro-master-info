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
        return $this->belongsTo(Cathedra::class, 'cathedra_id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }


}
