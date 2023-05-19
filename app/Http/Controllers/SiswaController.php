<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\support\Str;

class SiswaController extends Controller
{
    public function index()
    {
        return view('pages.form');
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik' => 'required|unique:siswas,nik',
            'nama' => 'required',
            'umur' => 'required',
            'agama' => 'required',
            'jenis_kelamin' => 'required'
        ], [
            'nik.required' => 'NIK tidak boleh kosong',
            'nama.required' => 'Nama tidak boleh kosong',
            'umur.required' => 'Umur tidak boleh kosong',
            'agama.required' => 'Agama harus dipilih',
            'jenis_kelamin.required' => 'Gender harus dipilih'
        ]);

        if($validator->fails())
        {
            return redirect('/form')
                ->withErrors($validator);
        }

        $user = new User;
        $user->role = 'user';
        $user->nama = $request->nama;
        $user->nik = $request->nik;
        $user->password = bcrypt($request->nik);
        $user->remember_token = Str::random(60);
        $user->save();

        $data = [
            'user_id' => $user->id,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'umur' => $request->umur,
            'agama' => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin
        ];

        Siswa::create($data);

        return redirect('/card')->with('message', 'Data berhasil ditambahkan');
    }
}
