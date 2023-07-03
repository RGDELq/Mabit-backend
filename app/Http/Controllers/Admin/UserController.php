<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = user::all();
        return view('users.index', compact('users'));
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
        return view('users.create');
    }

    public function store(Request $request)
    {
    
        
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $input = $request->all();
        
        user::create($input);
        return redirect()->route('users.index')
            ->with('success','user created successfully.');
    }

    public function show(user $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(user $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, user $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            
        ]);

        $input = $request->all();
    

        $user->update($input);
        return redirect()->route('users.index')
            ->with('success','user updated successfully.');
    }

    public function destroy(user $user)
    {
        $user->delete();
        return redirect()->route('users.index')
            ->with('success','user deleted successfully');
    }
}
