<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        //
    }

    public function register(Request $request)
    {
        $validateData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'email.unique' => 'El correo electrónico proporcionado ya está en uso.',
        ]);

        $user = User::create([
            'name' => $validateData['name'],
            'last_name' => $validateData['last_name'],
            'email' => $validateData['email'],
            'password' => Hash::make($validateData['password'])

        ]);

        return redirect()->route('home');
    }
}
