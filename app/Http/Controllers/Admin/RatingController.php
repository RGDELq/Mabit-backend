<?php

namespace App\Http\Controllers\Admin;

use App\Models\property;
use App\Models\rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class RatingController extends Controller
{


    public function index()
{
    $rating = rating::with('property')->get(); 
    return view('rating.index', compact('rating'));
}

    public function create()
    {
        
        $properties = property::get();
        return view('rating.create', compact('properties')); 
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'property_id' => 'required',
              'status' => 'required',
            'username' => 'required',

        ]);
        
        $input = $request->all();
        rating::create($input);
        return redirect()->route('rating.index')
        ->with('success','rating created successfully.');
    }
    
    public function show(rating $rating)
    {        $properties = property::get();

        return view('rating.show', compact('rating', 'properties') );
    }
    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(rating $rating)
    {
              $properties = property::get();

        return view('rating.edit', compact('rating','properties'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, rating $rating)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
            'username' => 'required',

            
        ]);

        $input = $request->all();


        $rating->update($input);
        return redirect()->route('rating.index')
            ->with('success','rating updated successfully.');
    }

   
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(rating $rating)
    {
        $rating->delete();
        return redirect()->route('rating.index')
            ->with('success','rating deleted successfully');
    
    }

}
