<?php

namespace App\Http\Controllers\BEController;

use App\Models\Employee;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class EmployeeProcess extends Controller{

    public function addEmployee(Request $request)
    {
        // Validasi input
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:employees,email',
            'username' => 'required|unique:employees,username',
            'password' => ['required', Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()],
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'role' => 'required',
            'gender' => 'required',
            'phone_number' => 'required|min:11',
            'address' => 'required'
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $extension = $file->getClientOriginalExtension();

            // Menggunakan nama dari input 'name' sebagai nama file
            $filename = Str::slug($request->name) . '.' . $extension;

            // Menentukan path penyimpanan relatif terhadap folder public
            $relativePath = 'assets/profile-image/';

            // Menentukan path penyimpanan fisik
            $destinationPath = public_path($relativePath);

            // Memindahkan file ke direktori tujuan
            $file->move($destinationPath, $filename);

            // Menyimpan path relatif ke dalam array data
            $data['profile_image'] = $relativePath.$filename;
        }

        $employee = Employee::create($data);
        $employee->profile_image = asset($employee->profile_image);

        return response()->json([
            'success' => true,
            'data' => $employee
        ]);
    }

    public function updateEmployee(Request $request, $id)
    {
        //update data employee
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'username' => 'nullable',
            'password' => 'nullable',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'role' => 'required',
            'gender' => 'nullable',
            'phone_number' => 'required|min:11',
            'address' => 'required',
        ]);

        $data = Employee::findOrFail($id);
        $data->name = $request->get('name');
        $data->email = $request->get('email');
        $data->role = $request->get('role');
        $data->phone_number = $request->get('phone_number');
        $data->address = $request->get('address');

        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $extension = $file->getClientOriginalExtension();

            $oldImagePath = public_path($data->profile_image);
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
            
            // Menggunakan nama dari input 'name' sebagai nama file
            $filename = Str::slug($request->name) . '.' . $extension;

            // Menentukan path penyimpanan relatif terhadap folder public
            $relativePath = 'assets/profile-image/';

            // Memindahkan file ke direktori tujuan
            $file->move(public_path('assets/profile-image'), $filename);

            // Menyimpan path relatif ke dalam model
            $data->profile_image = $relativePath.$filename;
        }

        $data->save();

        return response()->json($data);
    }

    public function changePasswordEmployee(Request $request, $id)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => ['required', 'confirmed', Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()],
        ]);

        $data = Employee::findOrFail($id);

        if (!Hash::check($request->current_password, $data->password)) {
            // Jika password saat ini tidak cocok
            return back()->withErrors(['current_password' => 'Password saat ini tidak cocok.']);
        }

        $data->password = Hash::make($request->new_password);
        $data->save();

        return response()->json([
            'id' => $id,
            'data' => $data,
            'success' => true,
            'message' => 'Password berhasil dirubah'
        ]);
    }

        /**
     * Remove the specified resource from storage.
     */
    public function destroyEmployee($id)
    {
        //menghapus data employee
        $data = Employee::find($id);

        if ($data) {
            $imagePath = public_path($data->profile_image);
            if (File::exists($imagePath)) {
                // Hapus file gambar profil
                File::delete($imagePath);
            }

            $data->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil dihapus'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data gagal untuk dihapus'
            ]);
        }
    }
}