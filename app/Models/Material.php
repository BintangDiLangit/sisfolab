<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function borrows()
    {
        return $this->belongsToMany(Material::class)->withPivot('borrowAmount');
    }
    
}
