<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Soal;
use App\Models\Waktu;
use App\Models\NonPns;
use App\Models\Berkala;
use App\Models\Jawaban;
use App\Models\Layanan;
use App\Models\Pegawai;
use App\Models\Peserta;
use App\Models\Kategori;
use App\Models\Pengajuan;
use App\Models\BenarSalah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function superadmin()
    {
        $t_pegawai = count(Pegawai::all());
        $t_pns = count(Pegawai::where('status_pegawai', 'PNS')->get());
        $t_cpns = count(Pegawai::where('status_pegawai', 'CPNS')->get());
        $nonpns = count(NonPns::get());
        
        $data = Berkala::orderBy('status','ASC')->paginate(10);
        $proses = count(Berkala::where('status', '!=', 3)->get());
        $selesai = count(Berkala::where('status', '=', 3)->get());
        return view('superadmin.home',compact('data','t_pegawai','t_pns','t_cpns','nonpns','proses','selesai'));
    }

    public function gantipass()
    {
        return view('superadmin.gantipass.index');
    }

    public function resetpass(Request $req)
    {
        if($req->password1 == $req->password2){
            $u = Auth::user();
            $u->password = bcrypt($req->password1);
            $u->save();
    
            Auth::logout();
            toastr()->success('Berhasil Di Ubah, Login Dengan Password Baru');
            return redirect('/');
        }else{
            toastr()->error('Password Tidak Sama');
            return back();
        }
    }

    public function soal()
    {
        return Soal::get();
    }

    public function pegawai()
    {    
        $page = 'profil';
        $pegawai = Auth::user()->pegawai;
        $layanan = Layanan::get();
        $pengajuan = Pengajuan::where('pegawai_id', $pegawai->id)->get();
        return view('pegawai.home',compact('page','pegawai','layanan','pengajuan'));
    }

    public function admin()
    {    
        $unitkerja = Auth::user()->name;
        $data = Berkala::where('unit_kerja', $unitkerja)->orderBy('created_at','DESC')->paginate(10);
        return view('admin.home',compact('data'));
    }
}
