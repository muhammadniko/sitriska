@extends('layout.administrator')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Report </br>
        <small>Buat Laporan Data Dalam Bentuk .xlsx</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> SI TRISKA</a></li>
        <li class="active">Laporan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
    <div class="col-md-4">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Export Data Laporan</h3>
            </div>
            <div class="box-body">
                <form action="{{ url('/administrator/tingkat-risiko/export') }}" method="get">
                    <p>Berdasarkan Kecamatan</p>
                    <select class="form-control" name="kecamatan">
                        <option value="All" selected disabled> - Pilih Kecamatan -</option>
                        <option value="Banjarmasin Utara">Banjarmasin Utara</option>
                        <option value="Banjarmasin Barat">Banjarmasin Barat</option>
                        <option value="Banjarmasin Selatan">Banjarmasin Selatan</option>
                        <option value="Banjarmasin Timur">Banjarmasin Timur</option>
                        <option value="Banjarmasin Tengah">Banjarmasin Tengah</option>
                    </select><br><br>
                    <p>Dengan Tingkat Risiko</p>
                    <select class="form-control" name="tingkat_risiko">
                        <option value="All" selected> - Semua -</option>
                        <option value="Tinggi">Tinggi</option>
                        <option value="Sedang">Sedang</option>
                        <option value="Rendah">Rendah</option>
                    </select><br>
                    <input type="submit" class="btn btn-primary form-control" name="export" value="EXPORT">
                </form>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection