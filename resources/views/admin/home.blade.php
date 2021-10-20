@extends('layouts.app')

@push('css')
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endpush
@section('title')
    BERANDA
@endsection
@section('content')
<a href="/admin/berkala/create" class="btn btn-sm bg-gradient-purple" data-toggle="tooltip" title="Refresh Data"><i class="fas fa-plus"></i> Ajukan Berkala</a>
<br/><br/>
<div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="card">
        <div class="card-header bg-gradient-success">
          <h3 class="card-title">UNIT KERJA : {{Auth::user()->name}}</h3>
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
                  <th>Proses</th>
                  
                  <th>Aksi</th>
              </thead>
              @php
                  $no=1;
              @endphp
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
                    <td>{{\Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:i')}}</td>
                    <td>ADMIN {{$item->unit_kerja}}</td>
                    <td>
                      <strong>
                        @if ($item->status == null)
                            
                        <span class="text-danger">PEMERIKSAAN BERKAS</span><br/>
                        <span class="">CETAK SK BERKALA</span><br/>
                        <span class="">SK SELESAI DI TTD</span><br/>
                        @elseif($item->status == 1)
                        <span class="text-success">PEMERIKSAAN BERKAS <i class="fas fa-check-circle"></i></span><br/>
                        <span class="text-danger">CETAK SK BERKALA</span><br/>
                        <span class="">SK SELESAI DI TTD</span><br/>
                        @elseif($item->status == 2)  
                        <span class="text-success">PEMERIKSAAN BERKAS <i class="fas fa-check-circle"></i></span><br/>
                        <span class="text-success">CETAK SK BERKALA <i class="fas fa-check-circle"></i></span><br/>
                        <span class="text-danger">SK SELESAI DI TTD</span><br/>
                        @elseif($item->status == 3)
                        <span class="text-success">PEMERIKSAAN BERKAS <i class="fas fa-check-circle"></i></span><br/>
                        <span class="text-success">CETAK SK BERKALA <i class="fas fa-check-circle"></i></span><br/>
                        <span class="text-success">SK SELESAI DI TTD <i class="fas fa-check-circle"></i></span><br/>
                        @endif
                      </strong>
                    </td>
                    <td>
                      @if ($item->status == null)
                      <a href="/admin/berkala/{{$item->id}}/upload" class="btn btn-xs btn-outline-primary"> <i class="fas fa-upload"></i> Upload Dokumen</a>
                          
                      @else
                          
                      @endif
                    </td>
                </tr>
                @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
</div>
@endsection

@push('js')

@endpush