<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\property;
use Illuminate\Http\Request;

class PropertyuserController extends Controller
{
    public function create(Request $request)
    {
        $images=new property();
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

            
                    $filename="";

            if($request->hasFile('image')){
                $filename = $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('img'), $filename);
            } else {
                $filename = null;
            }
            
            // Save the filename to the database
            $images->image = $filename;

    
        $images->name=$request->name;
        $images->image=$request->image;
        $images->category_id=$request->category_id;
        $images->detail=$request->detail;
        $images->price=$request->price;
        $images->floor=$request->floor;
        $images->rooms=$request->rooms;
        $images->city=$request->city;
        $images->phonenumber=$request->phonenumber;
        $images->status=$request->status;

        $images->image=$filename;
        $result=$images->save();
        if($result){
            return response()->json(['success'=>true]);
        }else{
            return response()->json(['success'=>false]);
        }
        
    }



    // store(Request $request)
    // {
        
    //     $request->validate([
    //         'name' => 'required',
    //         'category_id'=>'required',
    //         'detail' => 'required',
    //         'price' => 'required',
    //         'floor' => 'required',
    //         'rooms' => 'required',
    //         'city' => 'required',
    //         'phonenumber' => 'required',
    //         'status' => 'required',]);
            
    //     $input = $request->all();
    //     if ($image = $request->file('image')) {
    //         $destinationPath = 'img/';
    //         $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
    //         $image->move($destinationPath, $productImage);
    //         $input['image'] = "$productImage";
    //     }
    //     property::create($input);
    //     return redirect()->route('property.index')
    //         ->with('success','property created successfully.');

    // }
    // public function get()
    // {
    //     $images=property::orderBy('id','DESC')->get();
    //     return response()->json($images);
    // }

    // public function edit($id)
    // {
    //     $images=property::findOrFail($id);
    //     return response()->json($images);
    // }

    // public function update(Request $request,$id)
    // {
    //     $images=property::findOrFail($id);
        
    //     $destination=public_path("storage\\".$images->image);
    //     $filename="";
    //     if($request->hasFile('new_image')){
    //         if(File::exists($destination)){
    //             File::delete($destination);
    //         }

    //         $filename=$request->file('new_image')->store('posts','public');
    //     }else{
    //         $filename=$request->image;
    //     }

    //     $images->title=$request->title;
    //     $images->image=$filename;
    //     $result=$images->save();
    //     if($result){
    //         return response()->json(['success'=>true]);
    //     }else{
    //         return response()->json(['success'=>false]);
    //     }
    // }


    // public function delete($id)
    // {
    //     $images=property::findOrFail($id);
    //     $destination=public_path("storage\\".$images->image);
    //     if(File::exists($destination)){
    //         File::delete($destination);
    //     }
    //     $result=$images->delete();
    //     if($result){
    //         return response()->json(['success'=>true]);
    //     }else{
    //         return response()->json(['success'=>false]);
    //     }
    // }
}

