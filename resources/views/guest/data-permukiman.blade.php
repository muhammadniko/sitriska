@extends('layout.guest')
@section('title', 'Wilayah Permukiman - SI TRISKA')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Permukiman
        <small>{{ $jumlahLokasi }} Permukiman Terdaftar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> SI TRISKA</a></li>
        <li class="active">Data Permukiman</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Daftar Wilayah</h3>

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
                  <th>Kode Pos</th>
                  <th>Lokasi</th>
                  <th>Luas Area</th>
                  <th>Tingkat Risiko</th>
                </tr>
                @foreach ($listOfLokasi as $lokasi)
                <tr>
                  <td>{{$lokasi->kode_pos}}</td>
                  <td>{{$lokasi->kelurahan}}, {{$lokasi->kecamatan}}</td>
                  <td>{{$lokasi->luas_area}}KM<sup>2</sup></td>
                  <td>
                    @foreach ($lokasi->score as $score)
                    {{$score->tingkat_risiko}}
                    @endforeach
                  </td>
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