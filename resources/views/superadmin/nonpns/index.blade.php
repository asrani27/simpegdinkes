@extends('layouts.app')

@push('css')
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endpush
@section('title')
    DATA PEGAWAI NON PNS
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <a href="/superadmin/nonpns/create" class="btn btn-sm bg-gradient-purple" data-toggle="tooltip" title="Refresh Data"><i class="fas fa-plus"></i> Tambah Non PNS</a>
        <a href="/superadmin/nonpns" class="btn btn-sm bg-gradient-warning" data-toggle="tooltip" title="Refresh Data"><i class="fas fa-sync"></i></a>
        <br/><br/>
        <div class="card">
        <div class="card-header bg-gradient-success">
            <h3 class="card-title">Data Pegawai Non PNS ({{$data->total()}})</h3>
            <div class="card-tools">
                <form method="get" action="/superadmin/nonpns/search">
                <div class="input-group input-group-sm" style="width: 250px;">
                    <input type="text" name="search" class="form-control float-right" value="{{old('search')}}" placeholder="Nama / NIK">

                    <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap table-sm">
            <thead>
                <tr>
                <th>#</th>
                <th>Foto</th>
                <th>NIK/Nama/Jabatan</th>
                <th>Unit Kerja</th>
                <th>Aksi</th>
                </tr>
            </thead>
            @php
                $no =1;
            @endphp
            <tbody>
            @foreach ($data as $key => $item)
                    <tr style="font-size:11px; font-family:Arial, Helvetica, sans-serif">
                    <td>{{$data->firstItem() + $key}}</td>
                    <td>
                        @if ($item->foto == null)
                        <img class="img-circle img-bordered-sm" src="/theme/dist/img/default-150x150.png" alt="user image" width="60px">
                        @else
                        <img class="img-circle img-bordered-sm" src="/storage/{{$item->nik}}/{{$item->foto}}" alt="user image" width="60px">
                        @endif
                    </td>
                    <td>{{$item->nik}}<br/>{{$item->nama}}<br/>{{$item->jenis_tenaga}}</td>
                    <td>{{$item->unit_kerja == null ? '':$item->unit_kerja->nama}}</td>
                    <td>
                        
                        <form action="/superadmin/nonpns/{{$item->id}}" method="post">
                            @csrf
                            @method('delete')
                            <a href="/superadmin/nonpns/{{$item->id}}/edit" class="btn btn-xs bg-gradient-success"><i class="fas fa-edit"></i></a>
                            <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Yakin Di Hapus?');"><i class="fas fa-trash"></i></button>
                        </form>

                    </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        </div>
        {{$data->links()}}
    </div>
</div>

{{-- <div class="row">
    <div class="col-12">
        <div class="card">
        <div class="card-header bg-gradient-secondary">
            <h3 class="card-title">Data File Import</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap table-sm">
            <thead>
                <tr>
                <th>#</th>
                <th>File</th>
                <th>Aksi</th>
                </tr>
            </thead>
            @php
                $no =1;
            @endphp
            <tbody>
            @foreach ($import as $key => $item)
                    <tr style="font-size:11px; font-family:Arial, Helvetica, sans-serif">
                    <td>{{$no++}}</td>
                    <td>{{$item->file}}</td>
                    <td>                            
                        <a href="/superadmin/pegawai/import/{{$item->id}}/delete"  onclick="return confirm('Yakin Ingin Di Hapus?');" class="btn btn-xs bg-gradient-danger"><i class="fas fa-trash"></i></a>
                        <a href="/superadmin/pegawai/import/{{$item->id}}/sync" class="btn btn-xs bg-gradient-success text-sm"><i class="fas fa-sync"></i> Sinkron Server BKD</a>
                    </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        </div>
    </div>
</div> --}}

<div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <form method="post" action="/superadmin/pegawai/import" enctype="multipart/form-data">
            @csrf
        <div class="modal-header bg-gradient-secondary" style="padding:10px">
            <h4 class="modal-title text-sm">Import File</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>

        <div class="modal-body">
            <p>Harap Upload file excel sesuai dengan format yang telah ditentukan</p>
            <input type="file" name="file" required>
        </div>
        
        <div class="modal-footer justify-content-between">
            <button type="submit" class="btn btn-block btn-primary"><i class="fas fa-file-excel"></i> Upload</button>
        </div>
        </form>
        </div>
    </div>
</div>
@endsection

@push('js')
@endpush