<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = category::all();
        return view('category.index', compact('category'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
        
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
        return redirect()->route('category.index')
        ->with('success','category created successfully.');
    }
    
    public function show(category $category)
    {
        return view('category.show', compact('category'));
    }
    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        return view('category.edit', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        $request->validate([
            'name' => 'required',
            
        ]);

        $input = $request->all();


        $category->update($input);
        return redirect()->route('category.index')
            ->with('success','category updated successfully.');
    }

   
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        $category->delete();
        return redirect()->route('category.index')
            ->with('success','category deleted successfully');
    
    }
}
