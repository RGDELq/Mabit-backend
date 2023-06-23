<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class property extends Model
{
    use HasFactory;

    protected $fillable = ['name','category_id', 'image', 'detail', 'price', 'floor', 'rooms', 'city', 'phonenumber', 'status' ];

    public function ctegories()
    {
        return $this->hasMany(category::class,'id','name');
    }
}
