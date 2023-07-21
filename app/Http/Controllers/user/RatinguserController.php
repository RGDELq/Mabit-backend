<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\property;
use App\Models\rating;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class RatinguserController extends Controller
{


    public function index()
    {
        return QueryBuilder::for(rating::class)
        ->where('status', 1)
        ->latest()->get();    }


    public function create(Request $request)
{
    // Validate the request data
    $request->validate([
        'name' => 'required',
        'property_id' => 'required',
        'username' => 'required',
        'status' => 'required',
    ]);

    // Create a new rating
    $rating = new Rating();
    $rating->name = $request->input('name');
    $rating->property_id = $request->input('property_id');
    $rating->username = $request->input('username');
    $rating->status = $request->input('status');
    $rating->save();

    // Return a response with the new rating data and status code 201 (Created)
    return response()->json([
        'message' => 'Rating created successfully',
        'data' => $rating,
    ], 201);
}

}

