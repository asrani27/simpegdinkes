@extends('layouts.app')

@push('css')
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="/theme/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/theme/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush
@section('title')
    UPLOAD DOKUMEN
@endsection
@section('content')


<div class="row">
    <div class="col-12">
        <form method="post" action="/superadmin/berkala/{{$data->id}}/sk/upload" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{$data->nip}}" readonly>
                            </div>
                            </div>
                            
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">NAMA</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{$data->nama}}" readonly>
                            </div>
                            </div>

                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 text-danger">
                                <strong>Dokumen / File Upload hasil Scan Dalam Bentuk PDF dan Maks 2MB</strong>
                            </div>
                            </div>

                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">SK BERKALA TTD</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="sk_ttd">
                            </div>
                            </div>

                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <input type="checkbox" checked> DENGAN INI MENYATAKAN PROSES SK BERKALA TELAH SELESAI
                            </div>
                            </div>

                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-block btn-primary"><strong>UPLOAD DOKUMEN</strong></button>
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

<!-- Select2 -->
<script src="/theme/plugins/select2/js/select2.full.min.js"></script>

<script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
  
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
    })
</script>  
@endpush