<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $body = $request->all();

        //check user
        $user = User::where('username', $body['username'])->first();

        // Check password
        if (!$user || !Hash::check($body['password'], $user->password)) {
            return response([
                'error' => 'Đăng nhập thất bại!'
            ], 401);
        }

        // $token = $user->createToken($user["username"])->plainTextToken;

        // return response([
        //     'data' => $user,
        //     'access_token' => $token,
        //     'message' => 'Đăng nhập thành công!'
        // ], 200);
        return redirect()->route('home');
    }

    public function signUp(Request $request)
    {
        $body = $request->all();

        // Check user
        $user = User::where('username', $body['username'])->first();
        if ($user) {
            return response([
                'error' => 'Tài khoản đã tồn tại!'
            ], 409);
        }

        //check password
        if($body['password'] != $body['re_password'])
        {
            return response([
                'error' => 'Password không chính xác!'
            ], 409);
        }

        User::create($body);

        // return response([
        //     'message' => 'Đăng ký thành công!'
        // ], 200);

        return redirect()->route('home');
    }
}
