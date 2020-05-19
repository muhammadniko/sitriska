@extends('layout.administrator')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tingkat Risko Kebakaran </br>
        <small>Kalkulasi tingkat risiko kebakaran pada permukiman</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> SI TRISKA</a></li>
        <li class="active">Tingkat Risiko Kebakaran</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pilih Lokasi Permukiman</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                  Lokasi Permukiman Belum Terdaftar ? <button class="btn btn-primary">Tambahkan Lokasi Baru</button>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <select id="lokasi" name="select_lokasi">
                <option disabled selected>- Pilih Lokasi Permukiman </option>
              @foreach ($list_of_lokasi as $lokasi)
                <option value="{{ $lokasi->kode_pos }}">
                    {{ $lokasi->kelurahan }}
                </option>         
              @endforeach
              </select>
              <button id="next" class="btn btn-primary">Lanjutkan</button>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <form action="{{ url('/administrator/tingkat-risiko/kalkulasi-skor') }}" method="get">
            {{ csrf_field() }}
            <h2>Bahaya</h2>
            Listrik :
                <input type="radio" name="listrik" value="3"> Terhindar  
                <input type="radio" name="listrik" value="6"> Trafo Meledak
                <input type="radio" name="listrik" value="9"> Arus Pendek
            <br>
            Kompor :
                <input type="radio" name="kompor" value="2"> Terhindar  
                <input type="radio" name="kompor" value="4"> Ledakan Kompor Minyak
                <input type="radio" name="kompor" value="6"> Ledakan Kompor Gas
            <br>
            <h2>Kerentanan</h2>
            Kepadatan Penduduk :
                <input type="radio" name="kepadatan_penduduk" value="3"> Cukup Padat  
                <input type="radio" name="kepadatan_penduduk" value="6"> Padat
                <input type="radio" name="kepadatan_penduduk" value="9"> Sangat Padat
            <br>
            Kepadatan Bangunan :
                <input type="radio" name="kepadatan_bangunan" value="3"> Kepadatan Rendah  
                <input type="radio" name="kepadatan_bangunan" value="6"> Kepadatan Sedang
                <input type="radio" name="kepadatan_bangunan" value="9"> Kepadatan Tinggi
            <br>
            Ukuran Bangunan :
                <input type="radio" name="ukuran_bangunan" value="1"> Bangunan Kecil  
                <input type="radio" name="ukuran_bangunan" value="2"> Bangunan Sedang
                <input type="radio" name="ukuran_bangunan" value="3"> Bangunan Besar
            <br>
            Jarak Antar Bangunan :
                <input type="radio" name="jarak_bangunan" value="2"> Berjauhan 
                <input type="radio" name="jarak_bangunan" value="4"> Renggang
                <input type="radio" name="jarak_bangunan" value="6"> Berhimpitan
            <br>
            Konstruksi Bangunan :
                <input type="radio" name="konstruksi_bangunan" value="3"> Permanen  
                <input type="radio" name="konstruksi_bangunan" value="6"> Semi Permanen
                <input type="radio" name="konstruksi_bangunan" value="9"> Darurat
            <br>
            Lebar Jalan :
                <input type="radio" name="lebar_jalan" value="3"> > 6 Meter  
                <input type="radio" name="lebar_jalan" value="6"> 3-6 Meter
                <input type="radio" name="lebar_jalan" value="9"> < 3 Meter
            <br>
            Jarak BPK :
                <input type="radio" name="jarak_bpk" value="1"> < 1,5KM
                <input type="radio" name="jarak_bpk" value="2"> 1,5KM - 3KM
                <input type="radio" name="jarak_bpk" value="3"> > 3KM
            <br>
            <h2>Ketahanan</h2>
            Hydrant Umum :
                <input type="radio" name="hydrant" value="3"> Rusak/Tidak Tersedia
                <input type="radio" name="hydrant" value="9"> Baik
            <br>
            Tandon Air Umum :
                <input type="radio" name="tandon_air" value="2"> 5000 Liter  
                <input type="radio" name="tandon_air" value="4"> 10000 Liter
                <input type="radio" name="tandon_air" value="6"> 15000 Liter
            <br>
            Lokasi Sumber Air :
                <input type="radio" name="sumber_air" value="1"> Sulit Dijangkau  
                <input type="radio" name="sumber_air" value="3"> Dapat Dijangkau
            <br>
            <input type="hidden" name="kode_pos" value="" id="kode_pos">
            <input type="submit" name="hitung" value="Kalkulasi Tingkat Risiko">
            </form>

        </div>
    </div>
    </section>
    <!-- /.content -->
    
</div>
<!-- /.content-wrapper -->
@endsection

@section('script')
<script>
  $("#next").click(function(){
    var lokasi = $("#lokasi option:selected").val();
    $("#kode_pos").val(lokasi);
  })
</script>
@endsection