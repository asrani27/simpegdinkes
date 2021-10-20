@extends('layouts.app')

@push('css')
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endpush
@section('title')
    EDIT DATA PERSYARATAN
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <form method="post" action="/superadmin/persyaratan/{{$data->id}}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Persyaratan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" value="{{$data->nama}}" required>
                            </div>
                            </div>

                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-block btn-primary"><strong>Perbaharui</strong></button>
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