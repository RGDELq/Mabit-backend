<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $property = Property::with('category')->get(); // join categories table
        return view('property.index', compact('property'));
    }
    public function create()
    {
        
        $categories = category::get();
        return view('property.create', compact('categories')); 
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'category_id'=>'required',
            'detail' => 'required',
            'price' => 'required',
            'floor' => 'required',
            'rooms' => 'required',
            'city' => 'required',
            'phonenumber' => 'required',
            'status' => 'required',]);
            
        $input = $request->all();
        
        if ($image = $request->file('image')) {
            $destinationPath = 'img/';
            $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $productImage);
            $input['image'] = "$productImage";
        }
        property::create($input);
        return redirect()->route('property.index')
            ->with('success','property created successfully.');

    }
    public function show(property $property)
    {

        $categories = category::get();

        return view('property.show', compact('property', 'categories'));
    }

    public function edit(property $property)
    {
        $categories = category::get();
        return view('property.edit', compact('property', 'categories'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, property $property)
    {
        $request->validate([
            'name' => 'required',
            'category_id'=>'required',
            'detail' => 'required',
            'price' => 'required',
            'floor' => 'required',
            'rooms' => 'required',
            'city' => 'required',
            'phonenumber' => 'required',
            'status' => 'required',
        ]);

        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'img/';
            $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $productImage);
            $input['image'] = "$productImage";
        } else {
            unset($input['image']);
        }
        $property->update($input);
        return redirect()->route('property.index')
            ->with('success','property updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(property $property)
    {
        $property->delete();
        return redirect()->route('property.index')
            ->with('success','property deleted successfully');
    }

    public function updateStatus(Request $request, Property $property)
    {
        $request->validate([
            'status' => 'required',
        ]);
    
        $property->update([
            'status' => $request->status,
        ]);
    
        return redirect()->back()->with('success', 'Status updated successfully.');
    }

}