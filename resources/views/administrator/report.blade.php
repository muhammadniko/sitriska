@extends('layout.administrator')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Report </br>
        <small>Administrator Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> SI TRISKA</a></li>
        <li class="active">Laporan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        Download Laporan Berdasarkan Kecamatan
        <form action="{{ url('/administrator/tingkat-risiko/export') }}" method="get">
            <select class="form-control" name="kecamatan">
                <option value="All" selected> - Semua -</option>
                <option value="Banjarmasin Utara">Banjarmasin Utara</option>
                <option value="Banjarmasin Barat">Banjarmasin Barat</option>
                <option value="Banjarmasin Selatan">Banjarmasin Selatan</option>
                <option value="Banjarmasin Timur">Banjarmasin Timur</option>
            </select>
            Dengan Tingkat Risiko
            <select class="form-control" name="tingkat_risiko">
                <option value="All" selected> - Semua -</option>
                <option value="Tinggi">Tinggi</option>
                <option value="Sedang">Sedang</option>
                <option value="Rendah">Rendah</option>
            </select>
            <input type="submit" class="btn btn-primary form-control" name="export" value="DOWNLOAD">
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection