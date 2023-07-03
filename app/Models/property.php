<?php

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class property extends Model
{
    use HasFactory;

    protected $fillable = ['name','category_id', 'image', 'detail', 'price', 'floor', 'rooms', 'city', 'phonenumber', 'status' ];

    // public function ctegories()
    // {
    //     return $this->hasMany(category::class,'id','name');
    // }
    public function category()
{
    return $this->belongsTo(Category::class);
}
}
