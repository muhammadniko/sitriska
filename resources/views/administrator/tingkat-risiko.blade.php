@extends('layout.administrator')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Tingkat Risko Kebakaran </br> <small>Kalkulasi tingkat risiko kebakaran pada permukiman</small> </h1>
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
                    <div class="box-body">
                        <!-- Custom Tabs -->
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_1" data-toggle="tab">Pilih Lokasi Permukiman</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-3">
                                            <p>Lokasi Permukiman Belum Terdaftar ? <a href="">Tambah Lokasi Baru</a></p>
                                            <div class="form-group">
                                                <select class="form-control" id="lokasi" name="select_lokasi">
                                                    <option disabled selected>- Pilih Lokasi Permukiman </option>
                                                    @foreach ($list_of_lokasi as $lokasi)
                                                    <option value="{{ $lokasi->kode_pos }}"> {{ $lokasi->kelurahan }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <button id="next" href="#tab_2" data-toggle="tab" class="btn btn-success form-control"><b>LANJUTKAN !</b></button>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- /.tab-pane -->
                            </div> <!-- /.tab-content -->
                        </div> <!-- nav-tabs-custom -->
                    </div>
                </div>
                <form action="{{ url('/administrator/tingkat-risiko/kalkulasi-skor') }}" method="get">
                    {{ csrf_field() }}
                    <!-- The time line -->
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="timeline">
                                <li class="time-label">
                                    <span class="bg-red">
                                        Kerentanan (Vulnerbility)
                                    </span>
                                </li>
                                <li> <!-- timeline item -->
                                    <i class="fa fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header"><b>KEPADATAN PENDUDUK</b></h3>
                                        <div class="timeline-body">
                                            <input type="radio" name="kepadatan_penduduk" value="3"> Cukup Padat  
                                            <input type="radio" name="kepadatan_penduduk" value="6"> Padat
                                            <input type="radio" name="kepadatan_penduduk" value="9"> Sangat Padat
                                        </div>
                                    </div>
                                </li> <!-- END timeline item -->
                                <li> <!-- timeline item -->
                                    <i class="fa fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header"><b>KEPADATAN BANGUNAN</b></h3>
                                        <div class="timeline-body">
                                            <input type="radio" name="kepadatan_bangunan" value="3"> Kepadatan Rendah  
                                            <input type="radio" name="kepadatan_bangunan" value="6"> Kepadatan Sedang
                                            <input type="radio" name="kepadatan_bangunan" value="9"> Kepadatan Tinggi
                                        </div>
                                    </div>
                                </li> <!-- END timeline item -->
                                <li> <!-- timeline item -->
                                    <i class="fa fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header"><b>UKURAN BANGUNAN</b></h3>
                                        <div class="timeline-body">
                                            <input type="radio" name="ukuran_bangunan" value="1"> Bangunan Kecil  
                                            <input type="radio" name="ukuran_bangunan" value="2"> Bangunan Sedang
                                            <input type="radio" name="ukuran_bangunan" value="3"> Bangunan Besar
                                        </div>
                                    </div>
                                </li> <!-- END timeline item -->
                                <li> <!-- timeline item -->
                                    <i class="fa fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header"><b>JARAK ANTAR BANGUNAN</b></h3>
                                        <div class="timeline-body">
                                            <input type="radio" name="jarak_bangunan" value="2"> Berjauhan 
                                            <input type="radio" name="jarak_bangunan" value="4"> Renggang
                                            <input type="radio" name="jarak_bangunan" value="6"> Berhimpitan
                                        </div>
                                    </div>
                                </li> <!-- END timeline item -->
                                <li> <!-- timeline item -->
                                    <i class="fa fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header"><b>KONSTRUKSI BANGUNAN</b></h3>
                                        <div class="timeline-body">
                                            <input type="radio" name="konstruksi_bangunan" value="3"> Permanen  
                                            <input type="radio" name="konstruksi_bangunan" value="6"> Semi Permanen
                                            <input type="radio" name="konstruksi_bangunan" value="9"> Darurat
                                        </div>
                                    </div>
                                </li> <!-- END timeline item -->
                                <li> <!-- timeline item -->
                                    <i class="fa fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header"><b>LEBAR JALAN</b></h3>
                                        <div class="timeline-body">
                                            <input type="radio" name="lebar_jalan" value="3"> > 6 Meter  
                                            <input type="radio" name="lebar_jalan" value="6"> 3-6 Meter
                                            <input type="radio" name="lebar_jalan" value="9"> < 3 Meter
                                        </div>
                                    </div>
                                </li> <!-- END timeline item -->
                                <li> <!-- timeline item -->
                                    <i class="fa fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header"><b>JARAK BPK</b></h3>
                                        <div class="timeline-body">
                                            <input type="radio" name="jarak_bpk" value="1"> < 1,5KM
                                            <input type="radio" name="jarak_bpk" value="2"> 1,5KM - 3KM
                                            <input type="radio" name="jarak_bpk" value="3"> > 3KM
                                        </div>
                                    </div>
                                </li> <!-- END timeline item -->
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="timeline">
                                <li class="time-label">
                                    <span class="bg-red">
                                        Bahaya (Hazard)
                                    </span>
                                </li>
                                <li> <!-- timeline item -->
                                    <i class="fa fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header"><b>LISTRIK</b></h3>
                                        <div class="timeline-body">
                                            <input type="radio" name="listrik" value="3"> Terhindar  
                                            <input type="radio" name="listrik" value="6"> Trafo Meledak
                                            <input type="radio" name="listrik" value="9"> Arus Pendek
                                        </div>
                                    </div>
                                </li> <!-- END timeline item -->
                                <li> <!-- timeline item -->
                                    <i class="fa fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header"><b>KOMPOR</b></h3>
                                        <div class="timeline-body">
                                            <input type="radio" name="kompor" value="2"> Terhindar  
                                            <input type="radio" name="kompor" value="4"> Ledakan Kompor Minyak
                                            <input type="radio" name="kompor" value="6"> Ledakan Kompor Gas
                                        </div>
                                    </div>
                                </li> <!-- END timeline item -->
                                <li class="time-label">
                                    <span class="bg-green">
                                        Ketahanan (Capacity)
                                    </span>
                                </li>
                                <li> <!-- timeline item -->
                                    <i class="fa fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header"><b>HYDRANT UMUM</b></h3>
                                        <div class="timeline-body">
                                            <input type="radio" name="hydrant" value="3"> Rusak/Tidak Tersedia
                                            <input type="radio" name="hydrant" value="9"> Baik
                                        </div>
                                    </div>
                                </li> <!-- END timeline item -->
                                <li> <!-- timeline item -->
                                    <i class="fa fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header"><b>TANDON AIR UMUM</b></h3>
                                        <div class="timeline-body">
                                            <input type="radio" name="tandon_air" value="2"> 5000 Liter  
                                            <input type="radio" name="tandon_air" value="4"> 10000 Liter
                                            <input type="radio" name="tandon_air" value="6"> 15000 Liter
                                        </div>
                                    </div>
                                </li> <!-- END timeline item -->
                                <li> <!-- timeline item -->
                                    <i class="fa fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header"><b>LOKASI SUMBER AIR</b></h3>
                                        <div class="timeline-body">
                                            <input type="radio" name="sumber_air" value="1"> Sulit Dijangkau  
                                            <input type="radio" name="sumber_air" value="3"> Dapat Dijangkau
                                        </div>
                                    </div>
                                </li> <!-- END timeline item -->
                            </ul>
                            <input type="hidden" name="kode_pos" value="" id="kode_pos">
                            <input type="submit" class="btn btn-primary form-control" name="hitung" value="KALKULASI TINGKAT RISIKO">
                        </div>
                    </div>                    
                </form>
            </div>
        </div>
    </section>
</div>
@endsection

@section('script')
<script>
  $("#next").click(function(){
    var lokasi = $("#lokasi option:selected").val();
    $("#kode_pos").val(lokasi);
  })
</script>
@endsection