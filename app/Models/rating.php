<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    use HasFactory;

    protected $fillable = ['name','property_id','username','status'];



    public function property()
    {
        return $this->belongsTo(property::class);
    }
    
}
