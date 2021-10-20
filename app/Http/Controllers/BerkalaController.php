<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Berkala;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class BerkalaController extends Controller
{
    public function create()
    {
        $unitkerja = Auth::user()->name;
        $pegawai = Pegawai::where('unit_kerja', $unitkerja)->get();
        return view('admin.berkala.create',compact('pegawai'));
    }

    public function store(Request $req)
    {
        //Simpan Di Table Berkala
        $peg = Pegawai::find($req->pegawai_id);
        $check = Berkala::where('nip', $peg->nip)->latest()->first();
        if($check == null){
            $b = new Berkala;
            $b->pegawai_id = $req->pegawai_id;
            $b->nama = $peg->nama;
            $b->nip = $peg->nip;
            $b->pangkat = $peg->nm_pangkat.' / '. $peg->gol_pangkat;
            $b->jabatan = $peg->ket_jabatan;
            $b->unit_kerja = $peg->unit_kerja;
            $b->save();
            
            toastr()->success('Berkala Berhasil Di Simpan, Lanjutkan Ke Upload Persyaratan');
            return redirect('/admin/home');
        }else{
            $now = Carbon::today()->format('Y-m-d');
            $validate_tanggal = Carbon::parse($check->created_at)->addYears(1)->format('Y-m-d');
            if($now > $validate_tanggal){
                $b = new Berkala;
                $b->pegawai_id = $req->pegawai_id;
                $b->nama = $peg->nama;
                $b->nip = $peg->nip;
                $b->pangkat = $peg->nm_pangkat.' / '. $peg->gol_pangkat;
                $b->jabatan = $peg->ket_jabatan;
                $b->unit_kerja = $peg->unit_kerja;
                $b->save();
                
                toastr()->success('Berkala Berhasil Di Simpan, Lanjutkan Ke Upload Persyaratan');
                return redirect('/admin/home');
            }else{
                toastr()->error('Belum Bisa Mengajukan karena belum memenuhi syarat 2 tahun');
                return back();
            }
        }
    }

    public function upload($id)
    {
        $pegawai = Berkala::find($id);
        return view('admin.berkala.upload',compact('pegawai'));
    }

    public function storeUpload(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'sk_cpns'  => 'mimes:pdf|max:2048',
            'sk_pns'  => 'mimes:pdf|max:2048',
            'sk_pangkat'  => 'mimes:pdf|max:2048',
            'sk_berkala'  => 'mimes:pdf|max:2048',
        ]);

        if ($validator->fails()) {
            toastr()->error('File harus PDF dan Maks 2MB');
            return back();
        }
        
        $berkala = Berkala::find($id);

        $sk_cpns = $request->sk_cpns == null ? $berkala->sk_cpns : 'SKCPNS_'.$berkala->nip.'.pdf';
        $sk_pns  = $request->sk_pns == null ? $berkala->sk_pns : 'SKPNS_'.$berkala->nip.'.pdf';
        $sk_pangkat = $request->sk_pangkat == null ? $berkala->sk_pangkat : 'SKPANGKAT_'.$berkala->nip.'.pdf';
        $sk_berkala = $request->sk_berkala == null ? $berkala->sk_berkala : 'SKBERKALA_'.$berkala->nip.'.pdf';
        
        $berkala->update([
            'sk_cpns' => $sk_cpns,
            'sk_pns' => $sk_pns,
            'sk_pangkat' => $sk_pangkat,
            'sk_berkala' => $sk_berkala,
        ]);

        if($request->hasFile('sk_cpns'))
        {
            $request->sk_cpns->storeAs('/public/'.$berkala->nip.'/'.$berkala->id,$sk_cpns);
        }
        if($request->hasFile('sk_pns'))
        {
            $request->sk_pns->storeAs('/public/'.$berkala->nip.'/'.$berkala->id,$sk_pns);
        }
        if($request->hasFile('sk_pangkat'))
        {
            $request->sk_pangkat->storeAs('/public/'.$berkala->nip.'/'.$berkala->id,$sk_pangkat);
        }
        if($request->hasFile('sk_berkala'))
        {
            $request->sk_pangkat->storeAs('/public/'.$berkala->nip.'/'.$berkala->id,$sk_berkala);
        }

        toastr()->success('Berhasil Di Upload');
        return redirect('/admin/home');
    }

    public function berkasDisetujui($id)
    {
        Berkala::find($id)->update(['status' => 1]);
        toastr()->success('Validasi Berkas Berhasil');
        return back();
    }

    public function createSK($id)
    {
        $data = Berkala::find($id);
        return view('superadmin.berkala.sk',compact('data'));
    }

    public function storeSK(Request $req, $id)
    {
        $kadis = Pegawai::where('ket_jabatan', 'KEPALA DINAS KESEHATAN')->first();
        
        $attr['tanggal_sk']     = $req->tanggal_sk;
        $attr['nomor']          = $req->nomor_sk;
        $attr['perihal']        = 'Kenaikan Gaji Berkala a.n.';
        $attr['lampiran']       = $req->lampiran;
        $attr['gaji_lama']      = str_replace(',','',$req->gaji_lama);
        $attr['oleh_tanggal']   = $req->oleh_tanggal;
        $attr['oleh_pejabat']   = $req->oleh_pejabat;
        $attr['oleh_nomor']         = $req->oleh_nomor;
        $attr['oleh_tanggal_mulai'] = $req->oleh_tanggal_mulai;
        $attr['oleh_mkg_thn']       = $req->oleh_mkg_thn;
        $attr['oleh_mkg_bln']       = $req->oleh_mkg_bln;
        $attr['gaji_baru']          = str_replace(',','',$req->gaji_baru);
        $attr['dalam_golongan']     = $req->dalam_golongan;
        $attr['baru_mkg_thn']       = $req->baru_mkg_thn;
        $attr['baru_mkg_bln']       = $req->baru_mkg_bln;

        $attr['mulai_tanggal']       = $req->mulai_tanggal;
        $attr['gaji_yad']            = $req->gaji_yad;

        $attr['nama_kadis']          = $kadis->nama;
        $attr['nip_kadis']           = $kadis->nip;
        $attr['pangkat_kadis']       = $kadis->nm_pangkat;

        $attr['status']              = 2;
        
        Berkala::find($id)->update($attr);

        toastr()->success('SK Berhasil Di Buat');
        return redirect('/superadmin/home');
    }

    public function printSK($id)
    {
        $data = Berkala::find($id);
        return view('superadmin.berkala.print',compact('data'));
    }

    public function uploadSK($id)
    {
        $data = Berkala::find($id);
        return view('superadmin.berkala.upload',compact('data'));
    }

    public function storeSKTTD(Request $req, $id)
    {
        $validator = Validator::make($req->all(), [
            'sk_ttd'  => 'mimes:pdf|max:2048',
        ]);

        if ($validator->fails()) {
            toastr()->error('File harus PDF dan Maks 2MB');
            return back();
        }
        $berkala = Berkala::find($id);

        $sk_ttd = $req->sk_ttd == null ? $berkala->sk_ttd : 'SKTTD_'.$berkala->nip.'.pdf';

        $berkala->update([
            'sk_ttd' => $sk_ttd,
            'status' => 3,
        ]);

        if($req->hasFile('sk_ttd'))
        {
            $req->sk_ttd->storeAs('/public/'.$berkala->nip.'/'.$berkala->id,$sk_ttd);
        }

        toastr()->success('Berhasil Di Upload');
        return redirect('/superadmin/home');
    }
}
