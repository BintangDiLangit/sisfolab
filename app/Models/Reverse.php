<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reverse extends Model
{
    use HasFactory;
protected $guarded = [];

public function borrows(){
    return $this->belongsTo(Borrow::class);
}
}