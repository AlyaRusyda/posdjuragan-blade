<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdminResource;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\Actions\CreateNewApiToken;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function registerAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|unique:Admin,email',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors()->first()], 422);
        }

        $Admin = Admin::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'Admin',
        ]);

        // $Admin->sendEmailVerificationNotification();

        return response(['Admin' => $Admin, 'token' => $Admin->createToken('auth_token')->plainTextToken]);
    }


    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $Admin = Admin::where('email', $request->email)->first();

    if (!$Admin || !Hash::check($request->password, $Admin->password)) {
        return response()->json([
            'message' => 'Login failed',
        ], Response::HTTP_UNAUTHORIZED);
    }

    $token = $Admin->createToken('auth_token')->plainTextToken;

    return response()->json([
        'data' => [
            'Admin' => new AdminResource($Admin),
            'token' => $token,
        ],
    ], Response::HTTP_OK);
}


    public function verify($id, Request $request)
    {
        if (!$request->hasValidSignature()) {
            return response()->json([
                'status' =>  false,
                'message' => 'Verifying email gagal.'
            ], 400);
        }

        $user = Admin::where('id', $id)->where('role', 'Admin')->first();

        if ($user && !$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
            $user->email_verified_at = now();
            $user->save();
        }

        return redirect()->to('/');
    }

    public function notice()
    {
        return response()->json([
            'status' => false,
            'message' => 'Anda belum melakukan verifikasi email.'
        ], 400);
    }


    public function logout(Request $request)
    {
        // Revoke the token that was used to authenticate the current request
        $request->user()->currentAccessToken()->delete();

        return response(['message' => 'Successfully logged out']);
    }


}

