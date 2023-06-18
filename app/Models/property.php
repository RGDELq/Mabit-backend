<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class property extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'category_id',
        'name',
        'image',
        'description',
        'price',
        'floor',
        'rooms',
        'city',
        'owner',
        'status',
    ];
}
