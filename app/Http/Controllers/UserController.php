<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\support\Str;
use Intervention\Image\Image;
use Illuminate\Http\UploadedFile;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        if (Auth::attempt($request->only('nik', 'password'))) {

            Session::flash('success', 'Login Berhasil');

            return redirect('/perjalanan');
        }
        return redirect('/')->with('message', 'NIK atau Password Salah');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function postregister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik' => 'required|unique:users,nik',
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        if ($validator->fails()) {
            return redirect('/register')
                ->with('message', 'NIK sudah digunakan');
        }

        if ($request->hasFile('photo')) {
            $photos = $request->photo;
            $extension = $photos->getClientOriginalExtension();
            $filenameSimpan = 'gallery' . time() . '.' . $extension;
            $photos->move('gallery', $filenameSimpan);
        }

        $data = [
            'role' => 'user',
            'nik' => $request->nik,
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
            'photo' => $filenameSimpan,
        ];

        User::create($data);

        if (Auth::user()) {
            return redirect('/perjalanan');
        }

        if (Auth::attempt($request->only('nik', 'password'))) {

            Session::flash('success', 'Register Berhasil');

            return redirect('/perjalanan');
        }
        return redirect('/login');
    }
}
