<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use GuzzleHttp\Client;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $req)
    {
        if (Auth::attempt(['username' => $req->username, 'password' => $req->password], true)) {
            if(Auth::user()->hasRole('superadmin')){
                return redirect('/superadmin/home');
            }elseif(Auth::user()->hasRole('admin')){
                return redirect('/admin/home');
            }else{
                return redirect('/pegawai/home');
            }
        } else {
            toastr()->error('Username / Password Tidak Ditemukan');
            $req->flash();
            return back();
        }
    }

    public function daftar()
    {
        return view('daftar');
    }

    public function simpanDaftar(Request $req)
    {
        $role = Role::where('name','peserta')->first();

        if(User::where('username', $req->nik)->first() == null){
            $user = new User;
            $user->name = $req->nama;
            $user->username = $req->nik;
            $user->password = bcrypt($req->telp);
            $user->save();
    
            $user->roles()->attach($role);
    
            $peserta = new Peserta;
            $peserta->nik = $req->nik;
            $peserta->nama = $req->nama;
            $peserta->telp = $req->telp;
            $peserta->user_id = $user->id;
            $peserta->save();
            
            toastr()->success('Berhasil Di Simpan');
    
            return redirect('/');
        }else{
            toastr()->errro('NIK sudah digunakan');
            return back();
        }
    }
}
