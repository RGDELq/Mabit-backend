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
            'email' => ['required', 'email'],
            'password' =>  ['required', 'min:8'],
        
        ]);

        User::create([
            ''
        ])->assignRole('customer');

        return $this->login($request);
    }
}
