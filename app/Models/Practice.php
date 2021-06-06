<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    use HasFactory;
    protected $table = 'practices';
    protected $guarded = [];

    public function matkul(){
        return $this->belongsTo(Matkul::class,'matkul_id');
    }
    public function lab(){
        return $this->belongsTo(Lab::class,'lab_id');
    }
}