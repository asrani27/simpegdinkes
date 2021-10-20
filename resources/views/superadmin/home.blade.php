@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

@endpush
@section('title')
Beranda
@endsection
@section('content')
<div class="row">
    <div class="col-md-3 col-sm-6 col-12">
      <div class="info-box bg-gradient-info">
        <span class="info-box-icon"><i class="fas fa-users"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Pegawai</span>
          <span class="info-box-number">{{$t_pegawai}}</span>

          <div class="progress">
            <div class="progress-bar" style="width: 70%"></div>
          </div>
          <span class="progress-description">
            Total Data Pegawai
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-12">
      <div class="info-box bg-gradient-success">
        <span class="info-box-icon"><i class="fas fa-users"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">PNS</span>
          <span class="info-box-number">{{$t_pns}}</span>

          <div class="progress">
            <div class="progress-bar" style="width: 70%"></div>
          </div>
          <span class="progress-description">
            Total Data PNS
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-12">
      <div class="info-box bg-gradient-warning">
        <span class="info-box-icon"><i class="fas fa-users"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">CPNS</span>
          <span class="info-box-number">{{$t_cpns}}</span>

          <div class="progress">
            <div class="progress-bar" style="width: 70%"></div>
          </div>
          <span class="progress-description">
            Total Data CPNS
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-12">
      <div class="info-box bg-gradient-danger">
        <span class="info-box-icon"><i class="fas fa-users"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">NON PNS</span>
          <span class="info-box-number">{{$nonpns}}</span>

          <div class="progress">
            <div class="progress-bar" style="width: 70%"></div>
          </div>
          <span class="progress-description">
            Total Data Non PNS
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header bg-gradient-success">
          <h3 class="card-title">Daftar Pengajuan Berkala Pegawai</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover table-sm table-striped">
              <thead>
                  <th>No</th>
                  <th>NIP/Nama/Jabatan</th>
                  <th>File Persyaratan</th>
                  <th>Tanggal Di Buat</th>
                  <th>Yg Mengajukan</th>
                  <th>Status</th>
              </thead>
              <tbody>
                @foreach ($data as $key => $item) 
                <tr style="font-size:10px; font-family:Arial, Helvetica, sans-serif">
                  <td>{{$data->firstItem() + $key}}</td>
                  <td>{{$item->nip}} <br/>{{$item->nama}}<br/>{{$item->pangkat}}</td>
                  <td>
                    
                    <strong>
                      @if ($item->sk_cpns == null)
                      SK CPNS
                      @else
                      <a href="/storage/{{$item->nip}}/{{$item->id}}/{{$item->sk_cpns}}" class="text-primary" target="_blank">SK CPNS</a>
                      @endif
                      <br/>
                      @if ($item->sk_pns == null)
                      SK PNS
                      @else
                      <a href="/storage/{{$item->nip}}/{{$item->id}}/{{$item->sk_pns}}" class="text-primary" target="_blank">SK PNS</a>
                      @endif
                      
                      <br/>
                      @if ($item->sk_pangkat == null)
                      SK PANGKAT
                      @else
                      <a href="/storage/{{$item->nip}}/{{$item->id}}/{{$item->sk_pangkat}}" class="text-primary" target="_blank">SK PANGKAT</a>
                      @endif
                      
                      <br/>
                      @if ($item->sk_berkala == null)
                      SK BERKALA
                      @else
                      <a href="/storage/{{$item->nip}}/{{$item->id}}/{{$item->sk_berkala}}" class="text-primary" target="_blank">SK BERKALA</a>
                      @endif
                    </strong>
                  </td>
                  <td>{{\Carbon\Carbon::parse($item->updated_at)->format('d-m-Y H:i')}}</td>
                  <td>ADMIN {{$item->unit_kerja}}</td>
                  <td>
                    @if ($item->status == null)
                      <a href="/superadmin/berkala/{{$item->id}}/berkas/setuju" class="btn btn-sm btn-outline-info" onclick="return confirm('Yakin Berkas Sudah Lengkap?');"> <i class="fas fa-check"></i> VALIDASI BERKAS</a>
                    @elseif($item->status == 1)
                      <a href="/superadmin/berkala/{{$item->id}}/sk" class="btn btn-sm btn-outline-primary"> <i class="fas fa-edit"></i> BUAT SK BERKALA</a>
                    @elseif($item->status == 2)
                    <a href="/superadmin/berkala/{{$item->id}}/sk/print" class="btn btn-sm btn-outline-danger" target="_blank"> <i class="fas fa-file"></i> PRINT SK</a>
                      <a href="/superadmin/berkala/{{$item->id}}/sk/upload" class="btn btn-sm btn-outline-danger"> <i class="fas fa-upload"></i> UPLOAD SK YG TTD</a>
                    @elseif($item->status == 3)
                      <a href="/storage/{{$item->nip}}/{{$item->id}}/{{$item->sk_ttd}}" class="btn btn-sm btn-outline-success" target="_blank"> <i class="fas fa-check-circle"></i> SK SELESAI</a>
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      {{$data->links()}}
      <!-- /.card -->
    </div>
</div>
@endsection

@push('js')

@endpush