<?php
namespace App\Http\Controllers;
use App\Models\Image;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return view('products.index', compact('products'));
    }
    // public function fileUpload(Request $request)
    // {
    // $fileNames=[];

    //       foreach($request->file('file') as $image)
    //       {

    //           $imageName=  $image->getClientOriginalName();
    //           $image->move(public_path().'/images', $imageName);
    //           $fileNames[]=$imageName;
    //         }
    //         $images=json_decode($fileNames);
    //         image::create(['images'=>$images]);
            
    //         return back();
    // }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
    
        
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'img/';
            $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $productImage);
            $input['image'] = "$productImage";
        }
        Products::create($input);
        return redirect()->route('products.index')
            ->with('success','Product created successfully.');
    }

    public function show(Products $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Products $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Products $product)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'price' => 'required'
            
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

        $product->update($input);
        return redirect()->route('products.index')
            ->with('success','Product updated successfully.');
    }

    public function destroy(Products $product)
    {
        $product->delete();
        return redirect()->route('products.index')
            ->with('success','Product deleted successfully');
    }
}
