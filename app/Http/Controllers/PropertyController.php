<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\property;
use Illuminate\Http\Request;

class propertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $property = property::all();
        return view('property.index', compact('property'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('property.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $input = $request->all();
        category::create($input);
        return redirect()->route('property.index')
            ->with('success','property created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        return view('property.show', compact('property'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        return view('property.edit', compact('property'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required'
        ]);

        $input = $request->all();


        $category->update($input);
        return redirect()->route('category.index')
            ->with('success','Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        $category->delete();
        return redirect()->route('products.index')
            ->with('success','Product deleted successfully');
    
    }
}
