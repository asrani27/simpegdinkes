<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GantiPassController extends Controller
{
    public function index()
    {
        return view('superadmin.gantipass.index');
    }

    public function store(Request $req)
    {
        if($req->password == $req->password2){
            $u = Auth::user();
            $u->password = bcrypt($req->password);
            $u->save();
    
            toastr()->success('Password Berhasil Di Ubah');
            Auth::logout();
            return redirect('/');
        }else{
            toastr()->error('Password Tidak Sama');
            return back();
        }
    } 
}
