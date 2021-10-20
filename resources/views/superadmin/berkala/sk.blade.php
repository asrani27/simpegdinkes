@extends('layouts.app')

@push('css')
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endpush
@section('title')
    BUAT SK BERKALA
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <form method="post" action="/superadmin/berkala/{{$data->id}}/sk">
            @csrf
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="card">
                        <div class="card-header bg-gradient-success">
                            <h3 class="card-title">BUAT SK BERKALA</h3>
                            <div class="card-tools">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">TANGGAL SK.</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="tanggal_sk" value="{{\Carbon\Carbon::today()->format('Y-m-d')}}">
                            </div>
                            </div>

                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">NOMOR SK</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nomor_sk" value="822.3/  -Sekr/Diskes">
                            </div>
                            </div>
                            
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">LAMPIRAN</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="lampiran" value="-">
                            </div>
                            </div>

                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">PERIHAL</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="perihal" value="Kenaikan Gaji Berkala a.n. {{$data->nama}} / NIP: {{$data->nip}}">
                            </div>
                            </div>

                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <strong>Dengan Ini diberitahukan bahwa berhubung dengan telah dipenuhinya masa kerja dan syarat-syarat lainnya kepada :</strong>
                            </div>
                            </div>
                            
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">NAMA/NIP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" value="{{$data->nama}} / {{$data->nip}}">
                            </div>
                            </div>
                            
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">PANGKAT/JABATAN</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="pangkat" value="{{$data->pangkat}} / {{$data->jabatan}}">
                            </div>
                            </div>

                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">DINAS/PUSKESMAS</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="unit_kerja" value="{{$data->unit_kerja}} KOTA BANJARMASIN">
                            </div>
                            </div>

                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">GAJI POKOK LAMA</label>
                            <div class="col-sm-10">
                                <input type="text" data-type="currency" id="currency-field" class="form-control" name="gaji_lama" value="" onkeypress="return hanyaAngka(event)" required>
                            </div>
                            </div>


                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">OLEH PEJABAT</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="oleh_pejabat" value="KEPALA DINAS KESEHATAN KOTA BANJARMASIN">
                            </div>
                            </div>

                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">TANGGAL/NOMOR</label>
                            <div class="col-sm-5">
                                <input type="date" class="form-control" name="oleh_tanggal" value="" required>
                            </div>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="oleh_nomor" value="822.3/3846-Sekr/Diskes">
                            </div>
                            </div>
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">TANGGAL MULAI BERLAKU</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="oleh_tanggal_mulai" value="" required>
                            </div>
                            </div>
                            
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">MASA KERJA GOLONGAN</label>
                            <div class="col-sm-1">
                                <input type="text" class="form-control" name="oleh_mkg_thn" value="00">
                            </div>
                            <label class="col-sm-1 col-form-label">TAHUN</label>
                            <div class="col-sm-1">
                                <input type="text" class="form-control" name="oleh_mkg_bln" value="00">
                            </div>
                            <label class="col-sm-1 col-form-label">BULAN</label>
                            </div>

                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <strong>Diberikan Kenaikan Gaji Berkala Hingga Memperoleh :</strong>
                            </div>
                            </div>


                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">GAJI POKOK BARU</label>
                            <div class="col-sm-10">
                                <input type="text" data-type="currency" id="currency-field" class="form-control" name="gaji_baru" value="" onkeypress="return hanyaAngka(event)" required>
                            </div>
                            </div>

                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">BERDASARKAN MASA KERJA</label>
                            <div class="col-sm-1">
                                <input type="text" class="form-control" name="baru_mkg_thn" value="00">
                            </div>
                            <label class="col-sm-1 col-form-label">TAHUN</label>
                            <div class="col-sm-1">
                                <input type="text" class="form-control" name="baru_mkg_bln" value="00">
                            </div>
                            <label class="col-sm-1 col-form-label">BULAN</label>
                            </div>

                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">DALAM GOLONGAN</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="dalam_golongan" value="{{$data->pangkat}}">
                            </div>
                            </div>

                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">MULAI TANGGAL</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="mulai_tanggal" value="" required>
                            </div>
                            </div>
                            
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">UNTUK KENAIKAN GAJI YAD</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="gaji_yad" value="" required>
                            </div>
                            </div>
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">DESKRIPSI</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows=4>Diharapkan agar sesuai dengan Peraturan Pemerintah Republik Indonesia (PP.RI) No. 15 Tahun 2019 dan Surat Edaran Direktur Jenderal Perbendaharaan No.SE.15 /Th.2019, kepada pegawai tersebutdapat dibayarkan penghasilannyaberdasarkan gaji pokok yang baru</textarea>
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
<script>
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
      return true;
    }

    $("input[data-type='currency']").on({
    keyup: function() {
      formatCurrency($(this));
    },
    blur: function() { 
      formatCurrency($(this), "blur");
    }
});


function formatNumber(n) {
  // format number 1000000 to 1,234,567
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}


function formatCurrency(input, blur) {
  // appends $ to value, validates decimal side
  // and puts cursor back in right position.
  
  // get input value
  var input_val = input.val();
  
  // don't validate empty input
  if (input_val === "") { return; }
  
  // original length
  var original_len = input_val.length;

  // initial caret position 
  var caret_pos = input.prop("selectionStart");
    
  // check for decimal
  if (input_val.indexOf(".") >= 0) {

    // get position of first decimal
    // this prevents multiple decimals from
    // being entered
    var decimal_pos = input_val.indexOf(".");

    // split number by decimal point
    var left_side = input_val.substring(0, decimal_pos);
    var right_side = input_val.substring(decimal_pos);

    // add commas to left side of number
    left_side = formatNumber(left_side);

    // validate right side
    right_side = formatNumber(right_side);
        
    // Limit decimal to only 2 digits
    right_side = right_side.substring(0, 0);

    // join number by .
    input_val = "" + left_side;

  } else {
    // no decimal entered
    // add commas to number
    // remove all non-digits
    input_val = formatNumber(input_val);
    input_val = "" + input_val;
  }
  
  // send updated string to input
  input.val(input_val);

  // put caret back in the right position
  var updated_len = input_val.length;
  caret_pos = updated_len - original_len + caret_pos;
  input[0].setSelectionRange(caret_pos, caret_pos);
}

</script>
@endpush