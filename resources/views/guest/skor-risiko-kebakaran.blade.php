@extends('layout.guest')
@section('title', 'Penilaian Risiko Kebakaran - SI TRISKA')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tingkat Risiko Kebakaran
        <small>Berdasarkan hasil kalkulasi tingkat risiko</small>
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
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Hasil Penilaian Risiko</h3>
              <div class="box-tools">
                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-hover table-bordered">
                <tr>
                  <th class="text-center">Tanggal Entry</th>
                  <th class="text-center">Kelurahan</th>
                  <th class="text-center">Kecamatan</th>
                  <th class="text-center">Besaran </br> Bahaya (H)</th>
                  <th class="text-center">Besaran </br> Kerentanan (V)</th>
                  <th class="text-center">Besaran </br> Ketahanan (C)</th>
                  <th class="text-center">Besaran </br> Risiko (R)</th>
                  <th class="text-center">Tingkat Risiko</th>
                  <th class="text-center">Zonasi</th>
                </tr>
                <!-- Ambil Data Score -->
                @foreach ($listOfScore as $score)
                <tr>
                  <td>{{ $score->tgl_entry }}</td>
                  <!-- Ambil Data Lokasi -->
                  <td>{{ $score->lokasi->kelurahan }}</td>
                  <td>{{ $score->lokasi->kecamatan }}</td>
                  <td style="text-align: center">{{ $score->skor_ancaman }}</td>
                  <td style="text-align: center">{{ $score->skor_kerentanan }}</td>
                  <td style="text-align: center">{{ $score->skor_ketahanan }}</td>
                  <td style="text-align: center">{{ $score->skor_akhir }}</td>
                  <td style="text-align: center">{{ $score->tingkat_risiko }}</td>
                  <td>{{ $score->risklevels->zona }}</td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection