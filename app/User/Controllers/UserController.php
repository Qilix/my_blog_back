<?php

namespace App\User\Controllers;

use Illuminate\Routing\Controller;

use App\Common\Models\User;

use App\User\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Cookie;
use Carbon\Carbon;


class UserController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create(array_merge(
            $request->only('name', 'email'),
            ['password' => bcrypt($request->password)],
        ));

        return response()->json([
            'message' => 'You were successfully registered. Use your email and password to sign in.'
        ], 200);
    }


    public function login(Request $request)
    {
//        $credentials = $request->only('email', 'password');
//
//        if (!Auth::attempt($credentials)) {
//            return response()->json([
//                'message' => 'You cannot sign with those credentials',
//                'errors' => 'Unauthorised'
//            ], 401);
//        }

        $user = User::where('email', $request->get('email'))->firstOrFail();
        Auth::login($user);
        return response()->json([
            'user' => $user,
        ], 200);

    }

    public function logout(Request $request)
    {

        Auth::guard('web')->logout();

        return response()->json([
            'message' => 'You are successfully logged out',
        ]);
    }
}
