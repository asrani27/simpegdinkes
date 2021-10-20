<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 2</title>
<style type="text/css">
.auto-style1 {
	color: #000000;
	font-size: x-small;
}
.auto-style2 {
	text-align: center;
}
.auto-style3 {
	font-size: x-large;
}
.auto-style4 {
	font-size: x-small;
}
.auto-style5 {
	text-decoration: underline;	
    font-size: small;
}
.auto-style6 {
	font-size: small;
}

</style>
</head>

<body>

<table style="width: 100%">
	<tr>
		<td class="auto-style2"><img height="94" src="/theme/logo.jpg" width="71" />&nbsp;</td>
		<td class="auto-style2"><span class="auto-style3"><strong>PEMERINTAH 
		KOTA BANJARMASIN</strong></span><strong><br class="auto-style3" />
		</strong><span class="auto-style3"><strong>DINAS KESEHATAN</strong></span><br />
		<span class="auto-style4">Jl Pramuka Komplek Tirta Dharma (PDAM) Km 6 
		Banjarmasin Kode Pos 70249</span><br class="auto-style4" />
		<span class="auto-style4">Telp. (0511) 4281348 Faks. (0511) 4281348</span><br class="auto-style4" />
		<span class="auto-style1">E-mail : </span>
		
		<span class="auto-style1">dinkes@mail.banjarmasinkota.go.id</span><span class="auto-style1"> 
		Website : </span>
		<span class="auto-style1">https://dinkes.banjarmasinkota.go.id</span></td>
		<td>&nbsp;</td>
	</tr>
</table>
<hr />
<table style="width: 100%">
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td style="width: 404px">&nbsp;</td>
		<td>Banjarmasin, {{\Carbon\Carbon::parse($data->tanggal_sk)->translatedFormat('d F Y')}}</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td style="width: 404px">&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>Nomor</td>
		<td>:</td>
		<td style="width: 404px">{{$data->nomor}}</td>
		<td>Kepada Yth.</td>
	</tr>
	<tr>
		<td>Lampiran</td>
		<td>:</td>
		<td style="width: 404px">{{$data->lampiran}}</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td valign="top">Perihal</td>
		<td valign="top">:</td>
		<td valign="top" style="width: 404px">Kenaikan Gaji Berkala a.n<br />
		{{$data->nama}} /<br />
		NIP. {{konversi_nip($data->nip)}}</td>
		<td>Walikota Banjarmasin<br />
		Up. Kepala Badan Keuangan<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Daerah Kota Banjarmasin<br />
		di&nbsp;&nbsp; -<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Banjarmasin</td>
	</tr>
	<tr>
		<td valign="top">&nbsp;</td>
		<td valign="top">&nbsp;</td>
		<td valign="top" style="width: 404px">&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td valign="top">&nbsp;</td>
		<td valign="top">&nbsp;</td>
		<td valign="top" colspan="2">Dengan ini diberitahukan bahwa berhubung 
		dengan telah dipenuhinya masa kerja dan syarat-syarat lainnya kepada :<table style="width: 100%">
			<tr>
				<td>1.</td>
				<td>Nama / NIP</td>
				<td>:</td>
				<td class="auto-style6"><strong>{{$data->nama}} / {{konversi_nip($data->nip)}}</strong></td>
			</tr>
			<tr>
				<td>2.</td>
				<td>Pangkat / Jabatan</td>
				<td>:</td>
				<td class="auto-style6">{{$data->pangkat}} / {{$data->jabatan}}</td>
			</tr>
			<tr>
				<td>3.</td>
				<td>Dinas / Puskesmas</td>
				<td>:</td>
				<td class="auto-style6">{{$data->unit_kerja}}</td>
			</tr>
			<tr>
				<td>4.</td>
				<td>Gaji Pokok Lama</td>
				<td>:</td>
				<td>Rp. {{number_format($data->gaji_lama)}},-</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td colspan="3">(Atas dasar surat keputusan terakhir tentang 
				gaji / pangkat yang ditetapkan)</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>a. Oleh Pejabat</td>
				<td>:</td>
				<td>Kepala Dinas Kesehatan Kota Banjarmasin</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>b. Tanggal / Nomor</td>
				<td>:</td>
				<td>{{\Carbon\Carbon::parse($data->oleh_tanggal)->translatedFormat('d F Y')}} / {{$data->oleh_nomor}}</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>c. Tanggal Mulai Berlakunya</td>
				<td>:</td>
				<td>{{\Carbon\Carbon::parse($data->oleh_tanggal_mulai)->translatedFormat('d F Y')}}</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>d. Masa Kerja Golongan</td>
				<td>:</td>
				<td>{{$data->oleh_mkg_thn}} Tahun {{$data->oleh_mkg_bln}} Bulan</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td colspan="4">Diberikan Kenaikan Gaji Berkala hingga 
				memperoleh :</td>
			</tr>
			<tr>
				<td>5.</td>
				<td>Gaji Pokok Baru</td>
				<td>:</td>
				<td>Rp. {{number_format($data->gaji_baru)}},-</td>
			</tr>
			<tr>
				<td>6.</td>
				<td>Berdasarkan Masa Kerja</td>
				<td>:</td>
				<td>{{$data->baru_mkg_thn}} Tahun {{$data->baru_mkg_bln}} Bulan</td>
			</tr>
			<tr>
				<td>7.</td>
				<td>Dalam Golongan</td>
				<td>:</td>
				<td>{{$data->dalam_golongan}},-</td>
			</tr>
			<tr>
				<td>8.</td>
				<td>Mulai Tanggal</td>
				<td>:</td>
				<td>{{\Carbon\Carbon::parse($data->mulai_tanggal)->translatedFormat('d F Y')}}</td>
			</tr>
			<tr>
				<td>9.</td>
				<td>Untuk kenaikan gaji yad</td>
				<td>:</td>
				<td>{{\Carbon\Carbon::parse($data->gaji_yad)->translatedFormat('d F Y')}}</td>
			</tr>
			<tr>
				<td colspan="4">Diharapkan agar sesuai dengan Peraturan 
				Pemerintah Republik Indonesia (PP.RI) No. 15 Tahun 2019 dan 
				Surat Edaran Direktur Jenderal Perbendaharaan No.SE.15 /Th.2019, 
				kepada pegawai tersebut dapat dibayarkan penghasilannya 
				berdasarkan gaji pokok yang baru.</td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td valign="top">&nbsp;</td>
		<td valign="top">&nbsp;</td>
		<td valign="top" colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td valign="top">&nbsp;</td>
		<td valign="top">&nbsp;</td>
		<td valign="top">&nbsp;</td>
		<td valign="top">Kepala Dinas,<br />
		<br />
		<br />
        <span class="auto-style5">{{$data->nama_kadis}}</span><br/>
		<span class="auto-style6">{{$data->pangkat_kadis}}</span><br/>
		<span class="auto-style6">NIP. {{konversi_nip($data->nip_kadis)}}</span></td>
	</tr>
	<tr>
		<td valign="top" colspan="4" style="height: 26px">Tembusan Kepada Yth.<br />
		1. Menteri Dalam Negeri RI Di Jakarta<br />
		2. Menteri Keuangan RI Di Jakarta<br />
		3. Kepala BKN Di Jakarta<br />
		4. Kepala BPK Di Jakarta<br />
		5. Kepala Kanreg VIII BKN Banjarmasin Di Banjarbaru<br />
		6. Kepala BKD Pemprop KalSel Di Banjarbaru<br />
		7. Kepala BKD Pemko Banjarmasin Di Banjarmasin<br />
		8. Kepala Dinas Kesehatan Kota Banjarmasin Di Banjarmasin<br />
		9. Bendaharawan Gaji yang bersangkutan</td>
	</tr>
</table>


</body>
<script type="text/javascript">
    window.print();
</script>
</html>
