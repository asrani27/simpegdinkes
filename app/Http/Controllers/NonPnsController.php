<?php

namespace App\Http\Controllers;

use App\Models\NonPns;
use App\Models\Pegawai;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NonPnsController extends Controller
{
    public function index()
    {
        $data = NonPns::paginate(10);

        return view('superadmin.nonpns.index',compact('data'));
        
        toastr()->info('Unit Kerja Disimpan');
        return back();
    }

    public function create()
    {
        $unitkerja = UnitKerja::get();
        return view('superadmin.nonpns.create',compact('unitkerja'));
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'nik' =>  'unique:pegawai_nonpns',
        ]);

        if ($validator->fails()) {
            $req->flash();
            toastr()->error('NIK sudah ada');
            return back();
        }
        $attr = $req->all();
        NonPns::create($attr);
        
        toastr()->success('Sukses Di Simpan');
        return redirect('/superadmin/nonpns');
    }

    public function search()
    {
        $search = request()->get('search');
        $data   = NonPns::where('nama', 'LIKE','%'.$search.'%')->orWhere('nik', 'LIKE','%'.$search.'%')->paginate(10);
        $data->appends(['search' => $search])->links();
        request()->flash();
        
        return view('superadmin.nonpns.index',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nik' =>  'unique:pegawai_nonpns,nik,'.$id,
        ]);

        if ($validator->fails()) {
            $request->flash();
            toastr()->error('NIK sudah ada');
            return back();
        }

        $attr = $request->all();

        NonPns::find($id)->update($attr);

        toastr()->success('Sukses Di Update');
        return redirect('/superadmin/nonpns');
    }
    public function edit($id)
    {
        $data = NonPns::find($id);
        
        $unitkerja = UnitKerja::get();
        return view('superadmin.nonpns.edit',compact('data','unitkerja'));
    }

    public function destroy($id)
    {
        NonPns::find($id)->delete();
        toastr()->success('Sukses Di Hapus');
        return back();
    }
}
