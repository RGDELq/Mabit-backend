<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * login the user
     */
    public function login(Request $request) {
        $this->validate($request, [
            // 'name' => ['required', 'name'],
            'email' => ['required', 'email'],
            'password' =>  ['required', 'min:8'],
        ]);

        if (! Auth::attempt(['email'  => $request->email, 'password' => $request->password])) {
            return response([
                'message' => 'Unable to authenticate'
            ], 401);
        }

        return response([
            'user' => auth()->user(),
            'token' => auth()->user()->createToken('admin_token')->plainTextToken,
        ], 200);
    }

    public function register(Request $request) {

        /**
         * Validate his data
         * Create the customer and assign his role which is customer
         * return the newly created customer with his token
         */
        $this->validate($request, [
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' =>  ['required', 'min:8'],
            'phone' => ['required', 'max:10' , 'min:10'],
        ]);
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'phone' => $request->input('phone'),
        ])->assignRole('customer');

        return $this->login($request);
    }


    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();

        return $this->success([
            'message' => 'You have succesfully been logged out and your token has been removed'
        ]);
    }
}
