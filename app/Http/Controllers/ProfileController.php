<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Customer;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index($id)
    {
        $user = Customer::all();
        return view("customer-service.profile.my-profile", compact("profile"))->with(["profile" => Customer::all()]);
    }

    // public function showAllCustomers($id)
    // {
    //     $data = Customer::where('id', $id)->first();

    //     // $data = Customer::all();
    //     return response()->json([
    //         'data' => $data,
    //         'title' => 'My Profile'
    //     ])->width(['user' => Profile::all()]);
    // }
    public function show($id)
    {
        $profile = Employee::findOrFail($id);
        $title = 'Edit Profile';
        return view('customer-service.profile.my-profile', compact('profile'))->with('detail', $profile)->with('title', $title);
    }
    public function edit($id)
    {
        $profile = Employee::find($id);
        return view('customer-service.profile.edit-profile', compact('profile'))->with('profile', $profile)->with('title', 'Edit Profile');
    }
    public function update(Request $request, $id)
    {
        $profile = Employee::findOrFail($id);
        // dd($profile);
        $hasil = $profile->update($request->all());
        return redirect()->route('show', ['id' => $profile->id])->with('success', 'Data succesfully to update');
    }

    // public function editProfile(Request $request, $id)
    // {
    //     $profile = Profile::where('id', $id)->first();

    //     if ($profile) {
    //         $csid = $request->input('cs_id');
    //         $name = $request->input('name');
    //         $email = $request->input('email');
    //         $phone = $request->input('phone');

    //         $profile->cs_id = $csid;
    //         $profile->name = $name;
    //         $profile->email = $email;
    //         $profile->phone = $phone;

    //         $profile->save();

    //         $data = Profile::all();
    //         return response()->json([
    //             'status' => 'success',
    //             'data' => $data
    //         ], 200);
    //     } else {
    //         return response()->json(['status' => 'error'], 404);
    //     }
    // }

    public function ubahPassword($id)
    {
        $password = Employee::find($id);
        return view('customer-service.profile.edit-password', compact('password'))->with('editPassword', $password)->with('title', 'Change Password');
    }
    public function updatePassword(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'password' => 'required|min:6|max:100',
            'confirm_password' => 'required|same:password'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = Employee::where('id', $id)->first();

        if ($user && Hash::check($request->current_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);
            return response()->json([
                'message' => 'Password successfully updated',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Old password does not matched',
            ], 400);
        }
        // $password = Customer::find($id);
        // dd($password);
    }
    public function myProfile()
    {
        return view('admin.profile.my-profile', [
            "title" => "My Profile",
            "profile" => Profile::all()
        ]);
    }
    public function editAdmin()
    {
        return view('admin.profile.edit-profile', [
            "title" => "My Profile",
            "profile" => Profile::all()
        ]);
    }
    public function passwordAdmin()
    {
        return view('admin.profile.edit-password', [
            "title" => "Change Password",
        ]);
    }
    public function profileSuper()
    {
        return view('super-admin.profile.my-profile', [
            "title" => "My Profile",
            "profile" => Profile::all()
        ]);
    }
    public function editSuper()
    {
        return view('super-admin.profile.edit-profile', [
            "title" => "My Profile",
            "profile" => Profile::all()
        ]);
    }
    public function passwordSuper()
    {
        return view('super-admin.profile.edit-password', [
            "title" => "Change Password",
        ]);
    }
}
