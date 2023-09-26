<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    final public function Login(LoginRequest $request)
    {
        $user = (new User())->getUserByEmailOrPhone($request->all());

        if ($user && Hash::check($request->input('password'), $user->password)) {
            $user_data['token'] = $user->createToken($user->email)->plainTextToken;
            $user_data['name'] = $user->name;
            $user_data['number'] = $user->number;
            $user_data['photo'] = $user->photo;
            $user_data['email'] = $user->email;
            return response()->json($user_data);
        }
        throw ValidationException::withMessages([
            'email' => ['The Provided Credentials are incorrect'],
        ]);
    }

    final public function Logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json(['msg' => 'You have Successfully logged out.']);
    }
}
