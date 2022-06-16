<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();

        return response()->json([
            'statusCode' => 200,
            'message' => 'User.list',
            'data'=> $users
        ]);
    }
    public function show(User $user)
    {
        // $user = User::find($id);
        return response()->json([
            'statusCode' => 200,
            'message' => 'User.detail',
            'data'=> $user
        ]);
    }

    public function register(Request $request)
    {
        // validate fields
        $attrs = $request->validate([
            'username' => 'required|max:255',
            'phone_number' => 'required|min:9',
            'password' => 'required|min:6|confirmed',
        ]);
        // create user
        $user = User::create([
            'username' => $attrs['username'],
            'phone_number' => $attrs['phone_number'],
            'password' => bcrypt($attrs['password']),
            'remember_token' => Str::random(60),
        ]);
        $address = UserAddress::create([
            'user_id' => $user->id,
            'city'=> $request->get('city')
        ]);


        $token =   $user->createToken('API Token')->accessToken;
        return response()->json([
            'statusCode' => 200,
            'message' => 'Success',
            'data' => $user,
            'address' => $address,
            'token' => $token
        ]);
    }
    public function login(Request $request)
    {
        // validate fields
        $attrs = $request->validate([
            'phone_number' => 'required|min:9',
            'password' => 'required|min:6',
        ]);
        // attempt login
        if(!Auth::attempt($attrs))
        {
            return response()->json([
                'success' => false,
                'statusCode' => 403,
                'message' => 'Invalid credentials.'
            ]);
        }
        $accessToken =Auth::user()->createToken('API Token')->accessToken;
        return response()->json([
            'statusCode' => 200,
            'success' => true,
            'user' => auth()->user(),
            'access_token' => $accessToken
        ]);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'statusCode' => 200,
            'message' => 'Logout success.'
        ]);
    }

    public function userDestroy(User $user)
    {
        $user->delete();
        return response()->json([
            'statusCode' => 200,
            'message' => 'Delete success.'
        ]);
    }

}
