<?php

namespace App\Http\Controllers\Adminapi;
use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryAdminController extends Controller
{
    public function index()
    {
        return category::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
        ]);

        return category::create(array_merge($request->all(), ['user_id' => Auth::id()]));
    }

    public function update(Request $request, $id)
    {
        $category = category::findOrFail($id);
        $category->update($request->all());
        return $category;
    }

    public function destroy($id)
    {
        $category = category::findOrFail($id);
        $category->delete();
        return $category;
    }
}
