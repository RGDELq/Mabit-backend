<?php

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class property extends Model
{
    use HasFactory;

    protected $fillable = ['name','category_id', 'image', 'detail', 'price', 'floor', 'rooms', 'city', 'phonenumber', 'status' ];

   
    public function category()
{
    return $this->belongsTo(Category::class);
}
public function rating()
{
    return $this->hasMany(rating::class);
}

}
