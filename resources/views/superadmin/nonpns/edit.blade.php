@extends('layouts.app')

@push('css')
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endpush
@section('title')
    TAMBAH PEGAWAI NON PNS
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <form method="post" action="/superadmin/nonpns/{{$data->id}}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">NIK</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nik" value="{{$data->nik}}" required>
                            </div>
                            </div>

                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" value="{{$data->nama}}" required>
                            </div>
                            </div>
                            
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jenis Tenaga</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="jenis_tenaga" value="{{$data->jenis_tenaga}}" required>
                            </div>
                            </div>

                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Unit kerja</label>
                            <div class="col-sm-10">
                                <select name="unitkerja_id" class="form-control">
                                    @foreach ($unitkerja as $item)
                                        <option value="{{$item->id}}" {{$item->id == $data->unitkerja_id ? 'selected':''}}>{{$item->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            </div>
                            
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-block btn-primary"><strong>SIMPAN</strong></button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@push('js')

@endpush