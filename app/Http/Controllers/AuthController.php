<?php

namespace App\Http\Controllers;

// app/Http/Controllers/AuthController.php

use App\Http\Resources\csResource;
use App\Http\Resources\AdminResource;
use App\Models\cs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\Actions\CreateNewApiToken;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Admin;

class AuthController extends Controller
{
    public function registercustomer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'toko' => 'required|string|max:255',
            'hp' => 'required|string|max:255',
            'email' => 'required|string|email|unique:cs,email',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors()->first()], 422);
        }

        $cs = cs::create([
            'name' => $request->nama,
            'email' => $request->email,
            'toko' => $request->toko,
            'password' => Hash::make($request->password),
            'role' => 'cs',
        ]);

        // $cs->sendEmailVerificationNotification();

        return response(['cs' => $cs,'message' => 'Berhasil Melakukan Register']);
    }


    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    $user = Cs::where('email', $request->email)->first();

    // Check apabila user ada dan password benar
    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json([
            'message' => 'The provided credentials are incorrect.'
        ], 401);
    }
    session(['user_id' => $user->id]);
    $role = $user->role;
    // Check if user has the admin or cs role
    if (!in_array($user->role, ['admin', 'cs'])) {
        return response()->json([
            'message' => 'Access denied. You do not have permission to access this resource.'
        ], 403);
    }
        // Redirect based on role
        $redirectPath = $user->role === 'admin' ? 'admin/profile' : 'dataPelanggan';
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->intended($redirectPath);
    }

    // Hapus token
    $user->tokens->each(function ($token, $key) {
        $token->delete();
    });
    $test = $user->id;
    \Log::info('user_id: ', [$test]);
    // Buat token baru
    $token = $user->createToken('auth_token')->plainTextToken;

    // Melakukan return json dan redirect path untuk di direct menggunakan js di view
    return response()->json([
        'access_token' => $token,
        'token_type' => 'Bearer',
        'role' => $role,
        'user_id' => $user->id,
        'redirect_to' => $redirectPath, // Redirect based on role
    ]);
}

    // public function verify($id, Request $request)
    // {
    //     if (!$request->hasValidSignature()) {
    //         return response()->json([
    //             'status' =>  false,
    //             'message' => 'Verifying email gagal.'
    //         ], 400);
    //     }

    //     $user = cs::where('id', $id)->where('role', 'cs')->first();

    //     if ($user && !$user->hasVerifiedEmail()) {
    //         $user->markEmailAsVerified();
    //         $user->email_verified_at = now();
    //         $user->save();
    //     }

    //     return redirect()->to('/');
    // }

    public function notice()
    {
        return response()->json([
            'status' => false,
            'message' => 'Anda belum melakukan verifikasi email.'
        ], 400);
    }


    public function logout(Request $request)
{
    $request->user()->currentAccessToken()->delete();

    return response(['message' => 'Successfully logged out']);
}


}