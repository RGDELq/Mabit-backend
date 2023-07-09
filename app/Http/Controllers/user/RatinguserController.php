<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\property;
use App\Models\rating;
use Illuminate\Http\Request;

class RatinguserController extends Controller
{


    public function index()
    {
        return rating::all();
    }
    // public function create(Request $request)
    // {

    //     $request->validate([
    //         'name' => 'required',
    //         'property_id'=>'required',
    //     ]);

       

       
    //     if($request){
    //         return response()->json(['success'=>true, ]);
    //     }else{
    //         return response()->json(['success'=>false]);
    //     }}

    public function create(Request $request)
{
    // Validate the request data
    $request->validate([
        'name' => 'required',
        'property_id' => 'required',
        // 'rating' => 'required|numeric|min:1|max:5',
        // 'comment' => 'nullable|string|max:255',
    ]);

    // Create a new rating
    $rating = new Rating();
    $rating->name = $request->input('name');
    $rating->property_id = $request->input('property_id');
    // $rating->rating = $request->input('rating');
    // $rating->comment = $request->input('comment');
    $rating->save();

    // Return a response with the new rating data and status code 201 (Created)
    return response()->json([
        'message' => 'Rating created successfully',
        'data' => $rating,
    ], 201);
}

}

