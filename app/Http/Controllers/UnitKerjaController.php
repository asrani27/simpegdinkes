<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UnitKerja;
use Illuminate\Http\Request;

class UnitKerjaController extends Controller
{
    public function index()
    {
        $data = UnitKerja::get();
        return view('superadmin.unitkerja.index',compact('data'));
    }

    public function buatAkun($id)
    {
        
        $role = Role::where('name', 'admin')->first();

        //Create User UnitKerja
        $uk = UnitKerja::find($id);

        $check = User::where('username', '1.02.01.'.$uk->id)->first();
        if($check == null){
            $n = new User;
            $n->name = $uk->nama;
            $n->username = '1.02.01.'.$uk->id;
            $n->password = bcrypt('99997777');
            $n->save();
    
            $n->roles()->attach($role);
    
            $uk->update(['user_id' => $n->id]);
    
            toastr()->success('Akun sukses di buat, Password : 99997777');
        }else{
            toastr()->error('Username Sudah Ada');
        }
        
        return back();
    }   

    public function reset($id)
    {
        $u = UnitKerja::find($id)->user->update([
            'password' => bcrypt('99997777'),
        ]);

        toastr()->success('Password Baru: 99997777');
        return back();
    }
}
