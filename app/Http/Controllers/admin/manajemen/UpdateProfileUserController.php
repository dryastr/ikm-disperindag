<?php

namespace App\Http\Controllers\admin\manajemen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdateProfileUserController extends Controller
{
    public function update(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_telp' => 'required|string|max:15',
            'password' => 'nullable|string|min:6',
        ]);

        $user = Auth::user();


        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_telp = $request->no_telp;


        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}
