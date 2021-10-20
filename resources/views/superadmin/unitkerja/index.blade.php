@extends('layouts.app')

@push('css')
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endpush
@section('title')
    DATA UNIT KERJA
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        {{-- <a href="/superadmin/unitkerja/create" class="btn btn-sm bg-gradient-purple"><i class="fas fa-plus"></i> Tambah</a>
        <br/><br/> --}}
        {{-- <a href="/superadmin/unitkerja/account" class="btn btn-sm bg-gradient-info" data-toggle="tooltip" title="Create Account"><i class="fas fa-key"></i></a>
        <br/><br/> --}}
        <div class="card">
        <div class="card-header bg-gradient-success">
            <h3 class="card-title">Data Unit Kerja</h3>
            <div class="card-tools">
                {{-- <form method="get" action="/superadmin/persyaratan/search">
                <div class="input-group input-group-sm" style="width: 250px;">
                    <input type="text" name="search" class="form-control float-right" value="{{old('search')}}">

                    <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                </div>
                </form> --}}
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap table-sm">
            <thead>
                <tr>
                <th>#</th>
                <th>Kode Unit Kerja</th>
                <th>Nama Unit Kerja</th>
                <th>Aksi</th>
                </tr>
            </thead>
            @php
                $no =1;
            @endphp
            <tbody>
            @foreach ($data as $key => $item)
                    <tr style="font-size:11px; font-family:Arial, Helvetica, sans-serif">
                    <td>{{$key + 1}}</td>
                    <td>1.02.01.{{$item->id}}</td>
                    <td>{{$item->nama}}</td>
                    <td>
                        
                    @if ($item->user == null)
                        <a href="/superadmin/unitkerja/{{$item->id}}/akun" class="btn btn-xs bg-gradient-info"> Buat Akun</a>
                    @else
                        <a href="/superadmin/unitkerja/{{$item->id}}/reset" class="btn btn-xs bg-gradient-warning"><i class="fas fa-key"></i> Reset Password</a>
                    @endif
                    </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        </div>
    </div>
</div>

@endsection

@push('js')
@endpush