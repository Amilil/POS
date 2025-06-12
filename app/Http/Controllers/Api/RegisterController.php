<?php

namespace App\Http\Controllers\Api;

use App\Models\UserModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        // Set validation
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'nama' => 'required',
            'password' => 'required|min:5|confirmed',
            'level_id' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);

        // If validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // ambil file image dari request
        $image = $request->file('image');
        $imagePath = $image->store('uploads', 'public'); // simpan ke folder storage/app/public/uploads

        // Create user
        $user = UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
            'level_id' => $request->level_id,
            'image' => $image->hasName(),
        ]);

        // Return JSON if user is created
        if ($user) {
            return response()->json([
                'success' => true,
                'user' => $user,
            ], 201);
        }

        // Return JSON if process insert failed
        // Blok ini akan dieksekusi jika $user bernilai falsy (misalnya null, yang jarang terjadi dengan create())
        return response()->json([
            'success' => false,
        ], 409);
    }
}